<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\Pizza;

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
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/sabor_gauderio/livewire/update', $handle);
        });


        View::composer('components.user-bar', function ($view) {
            $view->with('pizzas', Pizza::all());
        });
    }
}
