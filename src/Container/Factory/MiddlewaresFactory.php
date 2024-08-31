<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Container\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Command\Middlewares;
use Ghostwriter\Testify\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Middleware\TestifyCommandMiddleware;
use Override;
use Throwable;

/**
 * @implements FactoryInterface<Middlewares>
 */
final readonly class MiddlewaresFactory implements FactoryInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): Middlewares
    {
        return Middlewares::new(
            $container->get(ErrorHandlerMiddleware::class),
            $container->get(TestifyCommandMiddleware::class)
        );
    }
}
