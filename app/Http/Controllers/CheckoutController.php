<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Services\CheckoutServiceInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CheckoutController
 * @package   App\Http\Controllers
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class CheckoutController extends Controller
{

    public function __construct(
        protected CheckoutServiceInterface $checkoutService,
    )
    {
    }

    /**
     * Show the checkout form
     */
    public function show(Request $request): View
    {
        $amount = $this->checkoutService->getRandomAmount();

        $paymentMethods = $this->checkoutService->getPaymenMethods();
        $request->session()->put('amount', $amount);
        return view('checkout.form', ['amount' => $amount, 'paymentMethods' => $paymentMethods]);
    }

    public function pay(PaymentRequest $request): View
    {
        $params = $request->validated();
        $amount = $request->session()->get('amount');
        $isBoleto = $params['payment-method'] == 'bolbradesco';
        if ($this->checkoutService->payBill(paymentMethod: $params['payment-method'], amount: $amount)) {
            $attrs = $this->checkoutService->getPaymentAttrs();
            return view(sprintf('checkout.%s_success', $isBoleto ? "boleto" : ""), ['attrs' => $attrs]);
        }
        return view('checkout.error');
    }
}
