<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Console\Provider;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Interface\Console\CommandInterface;
use Ghostwriter\Testify\Interface\Console\Provider\CommandProviderInterface;
use Override;
use RuntimeException;

use function array_key_exists;
use function is_a;
use function sprintf;

final class CommandProvider implements CommandProviderInterface
{
    /** @param array<non-empty-string,class-string<CommandInterface>> $commands */
    public function __construct(
        private readonly ContainerInterface $container,
        private array $commands = [],
    ) {}

    /** @param class-string<CommandInterface> $class */
    #[Override]
    public function add(string $command, string $class): void
    {
        if (array_key_exists($command, $this->commands)) {
            throw new RuntimeException(sprintf('Command %s already exists for command %s', $class, $command));
        }

        if (! is_a($class, CommandInterface::class, true)) {
            throw new RuntimeException(sprintf('Command %s must implement %s', $class, CommandInterface::class));
        }

        $this->commands[$command] = $class;
    }

    #[Override]
    public function provide(string $command): CommandInterface
    {
        return $this->container->get(
            $this->commands[$command] ?? throw new RuntimeException(sprintf('Command %s not found', $command))
        );
    }
}
