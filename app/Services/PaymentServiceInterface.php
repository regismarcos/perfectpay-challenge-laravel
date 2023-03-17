<?php

namespace App\Services;

use App\Enums\MercadoPagoBoletoPaymentMethodEnum;
use App\Enums\MercadoPagoCreditCardPaymentMethodEnum;

interface PaymentServiceInterface
{
    public function getPaymenMethods(): array;

    public function payCreditCard(float $amount, int $installments = 1): bool;
    public function payBoleto(float $amount): bool;
    public function getPaymentAttrs(): array;
}
