<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\CommandHandler;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Feature\NotFound\CommandNotFoundHandler;
use Ghostwriter\Testify\Feature\Testify\TestifyCommand;
use Ghostwriter\Testify\Feature\Testify\TestifyCommandHandler;
use Override;
use RuntimeException;
use Throwable;

final class CommandHandlerProvider implements CommandHandlerProviderInterface
{
    /**
     * @var array<class-string<CommandInterface>, class-string<CommandHandlerInterface>>
     */
    private array $commandHandlers = [
        TestifyCommand::class => TestifyCommandHandler::class,
    ];

    public function __construct(
        private readonly ContainerInterface $container,
    ) {
    }

    /**
     * @param class-string<CommandInterface>        $command
     * @param class-string<CommandHandlerInterface> $commandHandler
     *
     * @throws Throwable
     */
    public function add(string $command, string $commandHandler): void
    {
        if (\array_key_exists($command, $this->commandHandlers)) {
            throw new RuntimeException(
                \sprintf('Command handler %s already exists for command %s', $commandHandler, $command),
            );
        }

        if (! \is_a($command, CommandInterface::class, true)) {
            throw new RuntimeException(
                \sprintf('Command %s must implement %s', $command, CommandInterface::class),
            );
        }

        if (! \is_a($commandHandler, CommandHandlerInterface::class, true)) {
            throw new RuntimeException(
                \sprintf('Command handler %s must implement %s', $commandHandler, CommandHandlerInterface::class),
            );
        }

        $this->commandHandlers[$command] = $commandHandler;
    }

    /**
     * @throws Throwable
     */
    #[Override]
    public function get(CommandInterface $command): CommandHandlerInterface
    {
        $commandHandler = $this->commandHandlers[$command::class] ?? CommandNotFoundHandler::class;

        return $this->container->get($commandHandler);
    }
}
