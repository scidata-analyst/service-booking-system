<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        RateLimiter::for('api/login', function (Request $request) {
            $email = (string) $request->input('email', 'guest');

            return Limit::perDay(10)
                ->by($email . '|' . $request->ip())
                ->response(function () {
                    return response()->json([
                        'message' => 'Too many login attempts. Please try again later.',
                    ], 429);
                });
        });


        RateLimiter::for('api/register', function (Request $request) {
            $email = (string) $request->input('email', 'guest');

            return Limit::perDay(1)
                ->by($email . '|' . $request->ip())
                ->response(function () {
                    return response()->json([
                        'message' => 'Too many login attempts. Please try again later.',
                    ], 429);
                });
        });
    }
}
