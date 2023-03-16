<?php

namespace App\Services;

interface PaymentServiceInterface
{
    public function getPaymenMethods(): array;

    public function pay(float $amount, array $payer, int $installments = 1): bool;
}
