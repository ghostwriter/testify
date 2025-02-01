<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\CommandHandler\CommandHandlerProviderInterface;
use Ghostwriter\Testify\Container\ServiceProvider;
use Ghostwriter\Testify\Feature\Testify\TestifyCommand;
use Ghostwriter\Testify\Middleware\MiddlewareProviderInterface;
use Ghostwriter\Testify\Middleware\MiddlewareQueue;
use Override;
use Throwable;

final readonly class Application implements ApplicationInterface
{
    public function __construct(
        public ContainerInterface $container,
        public CommandHandlerProviderInterface $commandHandlerProvider,
        public MiddlewareProviderInterface $middlewareProvider,
    ) {
    }

    /**
     * @throws Throwable
     */
    public static function new(): self
    {
        $container = Container::getInstance();

        if (! $container->has(ServiceProvider::class)) {
            $container->provide(ServiceProvider::class);
        }

        return $container->get(self::class);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function dispatch(CommandInterface $command): int
    {
        $commandHandler = $this->commandHandlerProvider->get($command);

        $middlewares = $this->middlewareProvider->get($command);

        return MiddlewareQueue::new(...$middlewares)->process($command, $commandHandler);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function run(): int
    {
        return $this->dispatch($this->container->get(TestifyCommand::class));
    }
}
