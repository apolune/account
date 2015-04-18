<?php namespace Apolune\Account\Providers;

use Apolune\Account\Services\Auth\EloquentUserProvider;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->app['auth']->extend('pandaac', function()
		{
			$model = $this->app['config']['auth.model'];

			return new EloquentUserProvider($this->app, $this->app['hash'], $model);
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
