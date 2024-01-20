<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Command;

use Composer\InstalledVersions;
use Faker\Factory;
use Faker\Generator;
use Ghostwriter\Testify\Directory;
use Ghostwriter\Testify\FileContentGenerator;
use Ghostwriter\Testify\Filesystem;
use Ghostwriter\Testify\NamespaceDetector;
use Ghostwriter\Testify\PhpFileFinder;
use Override;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\SingleCommandApplication;
use Throwable;

use const PHP_EOL;

use function sprintf;
use function str_replace;

/** @see TestifyTest */
final class TestifyCommand extends SingleCommandApplication
{
    public function __construct(
        private readonly Filesystem $filesystem,
        private readonly NamespaceDetector $namespaceDetector,
        private readonly FileContentGenerator $fileContentGenerator,
        private readonly PhpFileFinder $phpFileFinder,
        private readonly Generator $fakerGenerator,
    ) {
        parent::__construct('Testify');

        $this->setName('testify');
        $this->setDescription('Generate missing Tests.');
        $this->setVersion(InstalledVersions::getPrettyVersion('ghostwriter/testify') ?? 'UNKNOWN');
        $this->addArgument('source', InputArgument::OPTIONAL, 'The path to search for missing tests.', 'src');
        $this->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Do not write any files.');
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        /** @var bool $dryRun */
        $dryRun = $input->getOption('dry-run');

        try {
            $sourceDirectory = Directory::new($input);
        } catch (Throwable $exception) {
            $output->writeln($exception->getMessage());

            return self::INVALID;
        }

        $progressBar = new ProgressBar($output);

        $output->writeln(sprintf(
            '%s by %s <%s>' . PHP_EOL,
            $this->fakerGenerator->word(),
            $this->fakerGenerator->name(),
            $this->fakerGenerator->email()
        ));

        $count = 0;

        $classContent = $this->filesystem->read($this->fileContentGenerator->stub('test'));

        foreach ($progressBar->iterate($this->phpFileFinder->find($sourceDirectory->path())) as $file) {
            $testFile = str_replace(['/src/', '.php'], ['/tests/Unit/', 'Test.php'], $file);

            if ($dryRun || $this->filesystem->missing($testFile)) {
                $output->writeln('Generating ' . $testFile);

                $class = $this->filesystem->basename($file, '.php');
                $test = $this->filesystem->basename($testFile, '.php');
                [$classNamespace, $testNamespace] = ($this->namespaceDetector)($file);

                /** @var array<string,string> $variables */
                $variables = [
                    'class' => $class,
                    'classNamespace' => $classNamespace,
                    'testClass' => $test,
                    'testNamespace' => $testNamespace,
                ];

                $testFileContent = $this->fileContentGenerator->render($classContent, $variables);

                $output->writeln(PHP_EOL . $testFileContent . PHP_EOL);

                ++$count;
                if ($dryRun) {
                    continue;
                }

                $this->filesystem->save($testFile, $testFileContent);
            }
        }
        $output->writeln(sprintf('%sGenerated %d missing tests.', PHP_EOL . PHP_EOL, $count));

        return self::SUCCESS;
    }

    public static function new(): self
    {
        $filesystem = new Filesystem();
        return new self(
            $filesystem,
            new NamespaceDetector(),
            new FileContentGenerator($filesystem),
            new PhpFileFinder(),
            Factory::create(),
        );
    }
}
