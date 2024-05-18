<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Shetabit\Payment\Facade\Payment;

class AppServiceProvider extends ServiceProvider {
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        // $this->app->bind('path.public', function () {
        //     return substr(base_path(), 0, strlen(base_path()) - 4).'public_html';
        // });
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        /*$this->app->bind('shetabit-payment', function () {
            $config = config('payment') ?? [];

            return new Payment($config);
        });*/
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Paginator::useBootstrapFive();
    }
}
