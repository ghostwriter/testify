<?php

declare(strict_types=1);

use Ghostwriter\Testify\Console\Command\GenerateCommand;
use Ghostwriter\Testify\Console\Handler\GenerateHandler;
use Ghostwriter\Testify\Console\Middleware\ErrorHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\ExceptionHandlerMiddleware;
use Ghostwriter\Testify\Console\Middleware\GenerateMiddleware;
use Ghostwriter\Testify\Console\Middleware\HelpCommandMiddleware;
use Ghostwriter\Testify\Console\Middleware\NotFoundMiddleware;
use Ghostwriter\Testify\Console\Middleware\TestifyCommandMiddleware;

return [
    'name'=>'Testify',
    'package' => 'ghostwriter/testify',
    'description'=>'Generate missing Tests.',
    'source'=>'./src',
    'tests'=>'./tests',
    'dry-run'=>false,
    'force'=>false,
    'commands' => [
        'generate' => GenerateCommand::class,
    ],
    'handlers' => [
        GenerateCommand::class => GenerateHandler::class,
    ],
    'middlewares' => [
        ExceptionHandlerMiddleware::class,
        ErrorHandlerMiddleware::class,

        HelpCommandMiddleware::class,

        GenerateMiddleware::class,
        TestifyCommandMiddleware::class,

        NotFoundMiddleware::class,
    ],
];
