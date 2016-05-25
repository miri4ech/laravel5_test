<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ここにcomposerを使用する処理を記述します
        // クラスベースのcomposer
        // View::composer('profile', 'App\Http\ViewComposers\ProfileComposer');

        // // クロージャーベースのcomposer
        // View::composer('dashboard', function($view)
        // {

        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
