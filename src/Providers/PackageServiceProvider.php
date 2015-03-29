<?php namespace Apolune\Account\Providers;

use Apolune\Core\Providers\ServiceProvider;

class PackageServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/../../resources/views', 'pandaac/account');

		$this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'pandaac/account');

		$this->publishes([
			__DIR__.'/../../config/package.php' => config_path('pandaac/account.php'),
		]);
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->register('Apolune\Account\Providers\RouteServiceProvider');

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'Apolune\Account\Services\Registrar'
		);
	}

}
