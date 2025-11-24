<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console;

use Ghostwriter\Container\Container;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Console\Provider\CommandProviderInterface;
use Ghostwriter\Testify\Console\Provider\HandlerProviderInterface;
use Ghostwriter\Testify\Console\Provider\MiddlewareProviderInterface;
use Ghostwriter\Testify\Console\Queue\MiddlewareQueue;
use Override;
use Throwable;

use function array_shift;

final readonly class Application implements ApplicationInterface
{
    public function __construct(
        public ContainerInterface $container,
        public CommandProviderInterface $commandProvider,
        public HandlerProviderInterface $handlerProvider,
        public MiddlewareProviderInterface $middlewareProvider,
    ) {}

    /**
     * @throws Throwable
     */
    public static function new(): self
    {
        return Container::getInstance()->get(self::class);
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function run(array $arguments = []): int
    {
        array_shift($arguments);

        $command = $this->commandProvider->provide($arguments[0] ?? 'generate');

        $handler = $this->handlerProvider->provide($command);

        $middlewares = $this->middlewareProvider->provide($command);

        return MiddlewareQueue::new(...$middlewares)->process($command, $handler);
    }
}
