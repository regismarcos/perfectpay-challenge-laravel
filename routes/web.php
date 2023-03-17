<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Route::get('/', [CheckoutController::class, 'show'])
    ->name('checkout.show');
Route::post('/payment-go', [CheckoutController::class, 'pay'])
    ->middleware(VerifyCsrfToken::class)
    ->name('checkout.pay');
