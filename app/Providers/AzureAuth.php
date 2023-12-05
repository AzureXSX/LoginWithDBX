<?php

namespace App\Providers;

use App\Models\UserX;
use Illuminate\Support\ServiceProvider;

class AzureAuth extends ServiceProvider
{
    

    public function register(): void
    {
        $this->app->singleton(UserX::class, function () {
            return new UserX();
        });
    }

    public function login(): bool{
        return true;
    }

    public function boot(): void
    {

    }
}
