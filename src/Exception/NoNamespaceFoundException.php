<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Exception;

use Ghostwriter\Testify\Interface\ExceptionInterface;
use RuntimeException;

final class NoNamespaceFoundException extends RuntimeException implements ExceptionInterface {}
