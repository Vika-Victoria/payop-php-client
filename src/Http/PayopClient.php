<?php

declare(strict_types=1);

namespace PayopClient\Http;

use PayopClient\Services\InvoiceService;

class PayopClient
{
    public function __construct(
        private HttpConnector $connector
    ) {
    }

    public function invoices(): InvoiceService
    {
        return new InvoiceService($this->connector);
    }
}
