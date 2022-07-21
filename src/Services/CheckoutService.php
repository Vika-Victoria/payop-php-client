<?php

declare(strict_types=1);

namespace PayopClient\Services;

use PayopClient\Models\AbstractModel;

class CheckoutService extends ApiService
{
    public function createBlankCardToken(AbstractModel $cardToken): array
    {
        return $this->connector()->post('/payment-tools/card-token/create', $cardToken->getAttributes());
    }

    public function createCheckoutTransaction(AbstractModel $checkout): array
    {
        return $this->connector()->post('/checkout/create', $checkout->getAttributes());
    }

    public function checkInvoiceStatus(string $invoiceId): array
    {
        return $this->connector()->get('/checkout/check-invoice-status/' . $invoiceId);
    }

    public function captureTransaction(AbstractModel $checkout): array
    {
        return $this->connector()->post('/checkout/capture', $checkout->getAttributes());
    }

    public function voidTransaction(AbstractModel $checkout): array
    {
        return $this->connector()->post('/checkout/void', $checkout->getAttributes());
    }

    public function getTransactionInfo(string $transactionId): array
    {
        return $this->connector()->get('/transactions/' . $transactionId);
    }
}
