<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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

		/*DB::listen(function(QueryExecuted $query){
            Log::info($query->sql);
        });*/
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
