<?php

declare(strict_types=1);

namespace PayopClient\Services;

use PayopClient\Http\HttpConnector;

class ApiService
{
    public function __construct(
        private HttpConnector $connector
    ) {
    }

    protected function connector(): HttpConnector
    {
        return $this->connector;
    }
}
