<?php

namespace App\Services;

/**
 * Class CheckoutServiceFactory
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class CheckoutServiceFactory
{
    public function __invoke(): CheckoutServiceInterface
    {
        /** @var PaymentServiceInterface $paymentService */
        $paymentService = app(PaymentServiceInterface::class);
        return new CheckoutService($paymentService);

    }
}
