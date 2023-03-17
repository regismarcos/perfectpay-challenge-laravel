<?php

namespace App\Services;

use MercadoPago\Payment;
use MercadoPago\SDK;

/**
 * Class PaymentServiceFactory
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class PaymentServiceFactory
{
    public function __invoke(): PaymentServiceInterface
    {
        /** @var array $configs */
        $configs = config('services.mercadopago');
        SDK::setAccessToken($configs['token']);
        return new PaymentService(new Payment());
    }
}
