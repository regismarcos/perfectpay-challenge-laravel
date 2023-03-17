<?php

namespace App\Http\Requests;

use App\Enums\MercadoPagoBoletoPaymentMethodEnum;
use App\Enums\MercadoPagoCreditCardPaymentMethodEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, array|string>
     */
    public function rules(): array
    {
        return [
            'payment-method' => 'in:bolbradesco,master',
        ];
    }
}
