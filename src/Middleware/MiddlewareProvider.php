<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Middleware;

use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Testify\Command\CommandInterface;
use Ghostwriter\Testify\Feature\ErrorHandler\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Feature\ExceptionHandler\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Feature\Help\HelpCommandMiddleware;
use Ghostwriter\Testify\Feature\Testify\TestifyCommand;
use Ghostwriter\Testify\Feature\Testify\TestifyCommandMiddleware;
use RuntimeException;
use Throwable;

final class MiddlewareProvider implements MiddlewareProviderInterface
{
    /**
     * @var list<class-string<MiddlewareInterface>>
     */
    private const array DEFAULT_MIDDLEWARES = [
        ErrorHandlerMiddleware::class,
        ExceptionHandlerMiddleware::class,
        HelpCommandMiddleware::class,
    ];

    /**
     * @var array<class-string<CommandInterface>,array<class-string<MiddlewareInterface>,bool>>
     */
    private array $commandMiddlewares = [
        TestifyCommand::class => [
            TestifyCommandMiddleware::class => true,
        ],
    ];

    public function __construct(
        private readonly ContainerInterface $container,
    ) {
    }

    /**
     * @param class-string<CommandInterface>    $command
     * @param class-string<MiddlewareInterface> $middleware
     */
    public function add(string $command, string $middleware): void
    {
        if (! \is_a($command, CommandInterface::class, true)) {
            throw new RuntimeException(
                \sprintf('Command %s must implement %s', $command, CommandInterface::class),
            );
        }

        if (! \is_a($middleware, MiddlewareInterface::class, true)) {
            throw new RuntimeException(
                \sprintf('Middleware %s must implement %s', $middleware, MiddlewareInterface::class),
            );
        }

        $this->commandMiddlewares[$command] = $middleware;
    }

    /**
     * @throws Throwable
     *
     * @return list<MiddlewareInterface>
     */
    public function get(CommandInterface $command): array
    {
        if (! \array_key_exists($command::class, $this->commandMiddlewares)) {
            return [];
        }

        $middlewares = $this->commandMiddlewares[$command::class];

        return \array_map(
            fn (string $middleware): MiddlewareInterface => $this->container->get($middleware),
            self::DEFAULT_MIDDLEWARES,
            \array_keys($middlewares),
        );
    }
}
