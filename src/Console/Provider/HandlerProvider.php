<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Console\Handler\NotFoundHandler;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\HandlerInterface;
use Ghostwriter\Testify\Interface\Console\Provider\HandlerProviderInterface;
use Override;
use RuntimeException;
use Throwable;

use function array_key_exists;
use function is_a;
use function sprintf;

final class HandlerProvider implements HandlerProviderInterface
{
    /**
     * @param array<class-string<CommandInterface>, class-string<HandlerInterface>> $handlers
     */
    public function __construct(
        private readonly ContainerInterface $container,
        private array $handlers = [],
    ) {}

    /**
     * @param class-string<CommandInterface> $command
     * @param class-string<HandlerInterface> $handler
     *
     * @throws Throwable
     */
    #[Override]
    public function add(string $command, string $handler): void
    {
        if (array_key_exists($command, $this->handlers)) {
            throw new RuntimeException(
                sprintf('Command handler %s already exists for command %s', $handler, $command),
            );
        }

        if (! is_a($command, CommandInterface::class, true)) {
            throw new RuntimeException(sprintf('Command %s must implement %s', $command, CommandInterface::class));
        }

        if (! is_a($handler, HandlerInterface::class, true)) {
            throw new RuntimeException(
                sprintf('Command handler %s must implement %s', $handler, HandlerInterface::class),
            );
        }

        $this->handlers[$command] = $handler;
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function provide(CommandInterface $command): HandlerInterface
    {
        $commandHandler = $this->handlers[$command::class] ?? NotFoundHandler::class;

        return $this->container->get($commandHandler);
    }
}
