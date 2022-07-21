<?php

declare(strict_types=1);

namespace PayopClient\Services;

class PaymentMethodsService extends ApiService
{
    public function getAvailablePaymentMethods(string $projectId)
    {
        return $this->connector()->get('/payment-methods/available-for-application/' . $projectId);
    }

    public function getAvailableWithdrawalMethods()
    {
        return $this->connector()->get('instrument-settings/payment-methods/available-withdrawal-for-user');
    }
}
