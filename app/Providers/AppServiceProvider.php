<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	function boot()
	{
		Schema::defaultStringLength(191);
		
		view()->composer('*', function ($view)
		{
			$viewName = $view->getName();
			view()->share('viewName', $viewName);
		});
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
