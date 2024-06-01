<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Factory;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\FactoryInterface;
use Ghostwriter\Testify\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Middleware\TestifyCommandMiddleware;
use Ghostwriter\Testify\Middlewares;
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
