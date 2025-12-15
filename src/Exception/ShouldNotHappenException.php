<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Exception;

use Ghostwriter\Testify\Interface\ExceptionInterface;
use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
