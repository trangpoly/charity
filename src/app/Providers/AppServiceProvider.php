<?php

namespace App\Providers;

use App\Models\VerificationOtp;
use App\Repositories\Client\RegisterUserRepository;
use App\Repositories\Client\RegisterUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RegisterUserRepositoryInterface::class, RegisterUserRepository::class);
    }
}
