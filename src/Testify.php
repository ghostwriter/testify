<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\CommandBusInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Command\Handlers;
use Ghostwriter\Testify\Command\Middlewares;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Container\ServiceProvider;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Ghostwriter\Testify\Middleware\MiddlewareInterface;
use Override;
use Throwable;

final readonly class Testify implements CommandBusInterface, HandlerInterface, MiddlewareInterface
{
    public function __construct(
        public ContainerInterface $container,
        public Handlers $handlers,
        public Middlewares $middlewares,
    ) {
        $this->handlers->add($this);
        $this->middlewares->add($this);
    }

    /**
     * @throws Throwable
     */
    public static function new(MiddlewareInterface ...$middleware): self
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
        return $this->middlewares->process($command, $this);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function handle(CommandInterface $command): int
    {
        return $this->handlers->handle($command);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        return $this->middlewares->process($command, $handler);
    }

    /**
     * @throws Throwable
     */
    public function run(): int
    {
        return $this->dispatch($this->container->get(TestifyCommand::class));
    }
}
