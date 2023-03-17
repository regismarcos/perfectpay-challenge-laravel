<?php

namespace App\Services;

use App\Enums\CheckoutEnum;
use Exception;
use MercadoPago\Card;
use MercadoPago\Customer;
use MercadoPago\Payer;
use MercadoPago\Payment;
use MercadoPago\SDK;

/**
 * Class CheckoutService
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class PaymentService implements PaymentServiceInterface
{
    protected $payer = [];

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
        try {
            $response = array_merge(["code" => 0, "body" => []], (array)SDK::get("/v1/payment_methods"));
            if ($response["code"] != 200) {
                throw new Exception('Error while fetching payment_methods', $response["code"]);
            }
        } catch (Exception $_exception) {
            throw new \RuntimeException("messages.payment.runtime-exception");
        }
        return (array)$response["body"];
    }

    /**
     * @throws Exception
     */
    public function payCreditCard(float $amount, int $installments = 1): bool
    {
        $payment = $this->payment;
        $payment->transaction_amount = $amount;
        $payment->token = $this->getCardTokenId();
        $payment->description = "Ergonomic Silk Shirt";
        $payment->installments = $installments;
        $payment->issuer_id = 24;

        $payment->payment_method_id = "master";
        $payment->payer = array(
            "email" => "jhon.doe@doe.com"
        );
        $payment->external_reference = "reftest";
        $response = $payment->save();
        return $response;
    }

    public function payBoleto(float $amount): bool
    {
        $payment = $this->payment;
        $payment->transaction_amount = $amount;
        $payment->token = '';
        $payment->description = "Ergonomic Silk Shirt";
//        $payment->installments = $installments;
//        $payment->issuer_id = 24;

        $payment->payment_method_id = 'bolbradesco';
        $payment->payer = array(
            "first_name" => "First Name",
            "last_name" => "Last Name",
            "email" => "jhon.doe@doe.com",
            "identification" => ["type" => "CPF", "number" => "19753626835"],
        );
        $payment->external_reference = "reftest";
        $response = $payment->save();

        return $response;
    }

    public function getPaymentAttrs(): array
    {
        return $this->payment->getAttributes();
    }

    protected function getCardTokenId(): string
    {
        $i_current_month = intval(date('m'));
        $i_current_year = intval(date('Y'));

        $security_code = rand(111, 999);
        $expiration_month = rand($i_current_month, 12);
        $expiration_year = rand($i_current_year + 2, 2999);

        $payload = array(
            "json_data" => array(
                "card_number" => "5031433215406351",
                "security_code" => (string)$security_code,
                "expiration_month" => str_pad($expiration_month, 2, '0', STR_PAD_LEFT),
                "expiration_year" => str_pad($expiration_year, 4, '0', STR_PAD_LEFT),
                "cardholder" => array(
                    "name" => "APRO",
//                    "identification" => ""
                )
            )
        );

        $response = SDK::post('/v1/card_tokens', $payload);

        return $response['body']['id'];
    }
}
