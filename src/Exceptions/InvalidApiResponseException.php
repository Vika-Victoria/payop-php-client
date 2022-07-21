<?php

declare(strict_types=1);

namespace PayopClient\Exceptions;

use Exception;
use Throwable;

class InvalidApiResponseException extends Exception
{
    private const CODE = 424;
    private const MESSAGE = 'Invalid response format from api.';

    public function __construct(Throwable $previous = null)
    {
        parent::__construct(self::MESSAGE, self::CODE, $previous);
    }
}
