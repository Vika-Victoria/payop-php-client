<?php

declare(strict_types=1);

namespace PayopClient;

use PayopClient\Http\PayopClient;

interface PayopClientFactoryInterface
{
    public function make(string $token): PayopClient;
}
