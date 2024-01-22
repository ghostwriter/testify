<?= '<?php' . \PHP_EOL . \PHP_EOL ?>
declare(strict_types=1);

namespace <?= $testNamespace ?>;

use <?= $classNamespace . '\\' . $class ?>;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(<?= $class ?>::class)]
final class <?= $testClass ?> extends TestCase
{
<?php foreach ($methods as $method) : ?>
    <?php if (isset($method['dataProviderName'])) : ?>
        #[DataProvider('<?= $method['dataProviderName'] ?>')]
        public function <?= $method['testMethodName'] ?>(<?= $method['testMethodParamsString'] ?>): void
        {
            self::assertTrue(true);
        }
        public function <?= $method['dataProviderName'] ?>(): \Generator
        {
            $faker = \Faker\Factory::create();
            for ($i = 100; $i !== 0; --$i) {
                yield [
                    __FUNCTION__ . '-' . $i => [
                    <?php foreach ($method['testMethodParams'] as $params) : ?>
                    $faker-><?= $params['fakerMethod'] ?>(),
                    <?php endforeach; ?>
                    ],
                ];
            }
        }
    <?php else : ?>
        public function <?= $method['testMethodName'] ?>(<?= $method['testMethodParamsString'] ?>): void
        {
            self::assertTrue(true);
        }
    <?php endif; ?>
<?php endforeach; ?>

}
