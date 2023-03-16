<?php

namespace App\Providers;

use App\Services\CheckoutService;
use App\Services\CheckoutServiceFactory;
use App\Services\CheckoutServiceInterface;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class CheckoutServiceProvider
 * @package   App\Services
 * @author    Marcos Regis <marcos.regis@hotmail.com>
 * @copyright Marcos Regis <www.marcosregis.com>
 */
class CheckoutServiceProvider extends ServiceProvider // implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
//        $this->app->bind(CheckoutServiceInterface::class, function () {
//            return (new CheckoutServiceFactory())();
//        });
        $this->app->bind(CheckoutServiceInterface::class, CheckoutService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
//    public function provides(): array
//    {
//        return [CheckoutServiceInterface::class];
//    }
}
