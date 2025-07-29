<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Validator::extend('not_past_date', function ($attribute, $value, $parameters, $validator) {
            return strtotime($value) >= strtotime(date('Y-m-d'));
        }, 'The :attribute must not be a past date.');
    }
}
