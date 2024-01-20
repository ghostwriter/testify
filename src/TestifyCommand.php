<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Composer\InstalledVersions;
use Faker\Factory;
use Ghostwriter\Testify\Exception\FailedToCreateDirectoryException;
use Override;
use PhpToken;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;

use const PHP_EOL;
use const T_NAME_QUALIFIED;
use const T_NAMESPACE;
use const T_NS_SEPARATOR;

use function basename;
use function count;
use function dirname;
use function explode;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function implode;
use function is_dir;
use function mkdir;
use function realpath;
use function sprintf;
use function str_ends_with;
use function str_replace;
use function str_starts_with;

/** @see TestifyTest */
final class TestifyCommand extends SingleCommandApplication
{
    public function __construct()
    {
        parent::__construct('Testify');

        $this->setName('testify');
        $this->setDescription('Generate missing Tests.');
        $this->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify'));
        $this->addArgument('source', InputArgument::OPTIONAL, 'The path to search for missing tests.', 'src');
        $this->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();

        $output->writeln(sprintf('%s by %s <%s>', $faker->company(), $faker->name(), $faker->email()));

        $output->writeln(sprintf('Version: %s' . PHP_EOL, InstalledVersions::getPrettyVersion('ghostwriter/testify')));

        $dryRun = $input->getOption('dry-run');

        $source = $input->getArgument('source');

        $sourcePath = realpath($source);

        if ($sourcePath === false) {
            $output->writeln('The path "' . $source . '" does not exist.');
            return self::INVALID;
        }

        if (! is_dir($sourcePath)) {
            $output->writeln('The path "' . $source . '" is not a directory.');
            return self::INVALID;
        }

        $progressBar = new ProgressBar($output);
        //        foreach ($progressBar->iterate($sources) as $src) {

        $findAllPhpFilesInPath = static function (string $path): array {
            $files = [];
            $directory = new RecursiveDirectoryIterator($path);
            $iterator = new RecursiveIteratorIterator($directory);

            $skip = static fn (string $filename): bool => match (true) {
                str_starts_with($filename, 'Abstract'),
                str_ends_with($filename, 'Trait.php'),
                str_ends_with($filename, 'Interface.php'),
                str_ends_with($filename, 'Test.php') => true,
                default => false,
            };

            foreach ($iterator as $info) {
                if ($info->getExtension() !== 'php') {
                    continue;
                }

                if ($skip($info->getFilename())) {
                    continue;
                }

                $files[] = $info->getPathname();
            }
            return $files;
        };

        $files = $findAllPhpFilesInPath($sourcePath);

        $determineTestPath = static fn (string $file): string => str_replace(
            ['src/', '.php'],
            ['tests/Unit/', 'Test.php'],
            $file
        );

        $classContent = <<<CODE
        <?php

        declare(strict_types=1);

        namespace {test_namespace};

        use {class_namespace}\{class};
        use PHPUnit\Framework\Attributes\CoversClass;
        use PHPUnit\Framework\TestCase;

        #[CoversClass({class}::class)]
        final class {test_class} extends TestCase
        {
            public function testExample(): void
            {
                self::markTestSkipped('TODO: Implement test.');
            }
        }
        CODE;

        $detectNamespace = static function (string $file): string {
            if (! file_exists($file)) {
                return '';
            }

            $fileContent = file_get_contents($file);

            if ($fileContent === false) {
                return '';
            }

            $tokens = PhpToken::tokenize($fileContent);

            $supported = [T_NAMESPACE, T_NAME_QUALIFIED, T_NS_SEPARATOR, ';'];

            $namespace = '';
            $inNamespace = false;
            foreach ($tokens as $token) {
                if (! $token->is($supported)) {
                    continue;
                }

                if ($token->is(T_NAMESPACE)) {
                    $inNamespace = true;
                    continue;
                }

                if (! $inNamespace) {
                    continue;
                }

                if ($token->is(';')) {
                    break;
                }

                if ($token->is(T_NAME_QUALIFIED)) {
                    $namespace .= $token->text;
                    continue;
                }

                if (! $token->is(T_NS_SEPARATOR)) {
                    continue;
                }

                $namespace .= '\\';
            }

            return $namespace;
        };

        $determineTestNamespace = static function (string $classNamespace): string {
            $namespaces = explode('\\', $classNamespace);

            $namespaces[1] .= 'Tests\\Unit';

            return implode('\\', $namespaces);
        };

        //        $progressBar = new ProgressBar($output, count($files));

        $count = 0;
        foreach ($progressBar->iterate($files) as $file) {
            $testFile = $determineTestPath($file);
            if ($dryRun || ! file_exists($testFile)) {
                //                    $output->writeln(PHP_EOL);
                ++$count;

                $classNamespace = $detectNamespace($file);
                $testNamespace = $determineTestNamespace($classNamespace);
                $test = basename($testFile, '.php');
                $class = basename($file, '.php');

                //                    $output->writeln('########################################################################');
                //                    $output->writeln('File: ' . $file);
                //                    $output->writeln('Test File: ' . $testFile);
                //                    $output->writeln('Class Namespace: ' . $classNamespace);
                //                    $output->writeln('Test Namespace: ' . $testNamespace);
                //                    $output->writeln('Class: ' . $class);
                //                    $output->writeln('Test: ' . $test);
                $output->writeln('Generating ' . $testFile);

                $testFileContent = str_replace(
                    ['{test_namespace}', '{class_namespace}', '{class}', '{test_class}'],
                    [$testNamespace, $classNamespace, $class, $test],
                    $classContent . PHP_EOL
                );

                //                    $output->writeln($testFileContent . PHP_EOL);

                if ($dryRun) {
                    continue;
                }

                $parentDirectory = dirname($testFile);
                if (! file_exists($parentDirectory)) {
                    $makeDir = mkdir($parentDirectory, 0777, true);
                    if (! $makeDir || ! is_dir($parentDirectory)) {
                        throw new FailedToCreateDirectoryException($parentDirectory);
                    }
                }

                file_put_contents($testFile, $testFileContent);
            }
        }
        $output->writeln(sprintf('%sGenerated %d missing tests.', PHP_EOL . PHP_EOL, $count));

        return self::SUCCESS;
    }

    public static function new(): self
    {
        return new self($_SERVER['argv']);
    }
}
