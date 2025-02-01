<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Exception;

use RuntimeException;

final class NoNamespaceFoundException extends RuntimeException implements ExceptionInterface
{
}
