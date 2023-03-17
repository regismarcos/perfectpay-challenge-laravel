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
    ) {}

    /**
     * Show the checkout form
     */
    public function show(Request $request): View
    {
        $amount = $this->checkoutService->getRandomAmount();
        $request->session()->put('amount', $amount);
        return view('checkout.form', ['amount' => $amount]);
    }

    public function pay(PaymentRequest $request)
    {
        $params = $request->validated();
        $amount = $request->session()->get('amount');

    }
}
