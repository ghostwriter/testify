<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Application;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Command\Handlers;
use Ghostwriter\Testify\Command\Middlewares;
use Ghostwriter\Testify\Handler\HandlerInterface;
use Override;
use Throwable;

final readonly class Application implements ApplicationInterface
{
    public function __construct(
        public ContainerInterface $container,
        public Handlers $handlers,
        public Middlewares $middlewares,
    ) {
        $this->handlers->add($this);
        $this->middlewares->add($this);
    }

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

    #[Override]
    public function process(CommandInterface $command, HandlerInterface $handler): int
    {
        return $this->middlewares->process($command, $handler);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function run(): int
    {
        return $this->dispatch(Container::getInstance()->get(CommandInterface::class));
    }
}
