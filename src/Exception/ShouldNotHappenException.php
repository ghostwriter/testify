<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\Exception;

use LogicException;

final class ShouldNotHappenException extends LogicException implements ExceptionInterface {}
