<?php

declare(strict_types=1);

namespace PayopClient\Services;

use PayopClient\Models\AbstractModel;


class InvoiceService extends ApiService
{
    public function getInvoiceInfo(int $id): array
    {
        return $this->connector()->get('/invoices/' . $id);
    }

    public function createInvoice(AbstractModel $invoice): array
    {
        return $this->connector()->post('/invoices/create', $invoice->getAttributes());
    }
}
