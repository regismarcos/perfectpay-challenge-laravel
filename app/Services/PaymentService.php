<?php

namespace App\Services;

use App\Enums\CheckoutEnum;
use MercadoPago\Payment;
use MercadoPago\PaymentMethod;

/**
 * Class CheckoutService
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class PaymentService implements PaymentServiceInterface
{
    public function __construct(protected Payment $payment)
    {
    }

    public function getRandomAmount(): float
    {
        return rand(CheckoutEnum::AMOUNT_MIN * 100, CheckoutEnum::AMOUNT_MAX * 100) / 100;
    }

    /**
     * @return array
     */
    public function getPaymenMethods(): array
    {
        return PaymentMethod::get("/v1/payment_methods");
    }

    /**
     * @throws \Exception
     */
    public function pay(float $amount, array $payer, int $installments = 1): bool
    {
        $this->payment->transaction_amount = $amount;
        $this->payment->payer = $payer;
        $this->payment->installments = $installments;
        return $this->payment->save();
    }
}
