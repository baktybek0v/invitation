<?php

namespace App\Providers;

use App\Models\Translation;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return <void></void>
     */	
    public function boot()
    {	
        view()->composer('bash.*',function($view) {
            $view->with('eventLimit', 5); // максимальное количество показываемых событий	
        });

		view()->composer('web.*',function($view) {
			$view->with('trans',  Translation::getAll());
		});
    }
}
