<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Ghostwriter\Testify\Interface\Console\ApplicationInterface;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use Ghostwriter\Testify\Interface\Console\Provider\HandlerProviderInterface;
use Ghostwriter\Testify\Interface\Console\Provider\MiddlewareProviderInterface;
use Override;
use Throwable;

final readonly class Application implements ApplicationInterface
{
    public function __construct(
        public ContainerInterface $container,
        public CommandProviderInterface $commandProvider,
        public HandlerProviderInterface $handlerProvider,
        public MiddlewareProviderInterface $middlewareProvider,
    ) {}

    /** @throws Throwable */
    public static function new(): self
    {
        return Container::getInstance()->get(self::class);
    }

    /** @throws Throwable */
    #[Override]
    public function run(array $arguments = []): int
    {
        $command = $this->commandProvider->provide('generate');

        $handler = $this->handlerProvider->provide($command);

        $middlewares = $this->middlewareProvider->provide($command);

        return MiddlewareQueue::new(...$middlewares)->process($command, $handler);
    }
}
