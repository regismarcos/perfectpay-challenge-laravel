<?php

namespace App\Services;

use App\Enums\CheckoutEnum;

/**
 * Class CheckoutService
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class CheckoutService implements CheckoutServiceInterface
{

    public function __construct(protected PaymentServiceInterface $paymentService)
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

    }
}
