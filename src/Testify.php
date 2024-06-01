<?php

declare(strict_types=1);

namespace Ghostwriter\Testify;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\TestifyCommand;
use Ghostwriter\Testify\Interface\CommandBusInterface;
use Ghostwriter\Testify\Interface\CommandInterface;
use Ghostwriter\Testify\Interface\HandlerInterface;
use Ghostwriter\Testify\Interface\MiddlewareInterface;
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
    public static function new(MiddlewareInterface ...$middlewares): self
    {
        $container = Container::getInstance();

        if (! $container->has(ServiceProvider::class)) {
            $container->provide(ServiceProvider::class);
        }

        return $container->build(self::class, $middlewares);
    }

    /**
     * @throws Throwable
     */
    public function run(): int
    {
        return $this->dispatch($this->container->get(TestifyCommand::class));
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
}
