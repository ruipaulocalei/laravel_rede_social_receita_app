<?php

namespace App\Providers;

use App\CategoriaReceita;
use Illuminate\Support\ServiceProvider;

class CategoriasProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $categorias = CategoriaReceita::all();
            $view->with('categorias', $categorias);
        });
    }
}
