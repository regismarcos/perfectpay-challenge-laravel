<?php

namespace App\Services;

use App\Enums\MercadoPagoBoletoPaymentMethodEnum;
use App\Enums\MercadoPagoCreditCardPaymentMethodEnum;

/**
 * Interface CheckoutServiceInterface
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
interface CheckoutServiceInterface
{
    public function getRandomAmount(): float;

    public function getPaymenMethods(): array;

    public function payBill(float $amount, string $paymentMethod): bool;

}
