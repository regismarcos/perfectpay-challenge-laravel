<?php

namespace App\Services;

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

}
