<?php

namespace Apolune\Account\Providers;

use Apolune\Account;
use Apolune\Core\AggregateServiceProvider;
use Apolune\Contracts\Account as Contracts;

class AccountServiceProvider extends AggregateServiceProvider
{
    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $middleware = [
        'confirmed'             => Account\Http\Middleware\Confirmed::class,
        'unconfirmed'           => Account\Http\Middleware\Unconfirmed::class,
        'registered'            => Account\Http\Middleware\Registered::class,
        'unregistered'          => Account\Http\Middleware\Unregistered::class,
        'account.character'     => Account\Http\Middleware\AccountCharacter::class,
        'character.deleted'     => Account\Http\Middleware\CharacterDeleted::class,
        'character.notdeleted'  => Account\Http\Middleware\CharacterNotDeleted::class,
    ];

    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        HashServiceProvider::class,
        AuthServiceProvider::class,
        ValidationServiceProvider::class,
        MigrationServiceProvider::class,
        EventServiceProvider::class,
        ExceptionsServiceProvider::class,
    ];

    /**
     * Holds all of the contracts we want to bind.
     *
     * @var array
     */
    protected $bindings = [
        'account'               => [Contracts\Account::class                => Account\Account::class],
        'account.properties'    => [Contracts\AccountProperties::class      => Account\AccountProperties::class],
        'account.registration'  => [Contracts\AccountRegistration::class    => Account\AccountRegistration::class],
        'player'                => [Contracts\Player::class                 => Account\Player::class],
        'player.properties'     => [Contracts\PlayerProperties::class       => Account\PlayerProperties::class],
        'player.online'         => [Contracts\PlayerOnline::class           => Account\PlayerOnline::class],
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Resources/Config/account.php' => config_path('pandaac/apolune/account.php'),
        ], 'config');
    }
}
