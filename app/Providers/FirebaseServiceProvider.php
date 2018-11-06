<?php

namespace App\Providers;

use Kreait\Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory as FirebaseFactory;
use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Firebase::class, function() {
            return (new FirebaseFactory())
            ->withServiceAccount(ServiceAccount::fromJsonFile(env(storage_path().'FIREBASE_SERVICE_ACCOUNT')))
            ->withDatabaseUri('FIREBASE_DATABASE_URI')
            ->create();
        });

        $this->app->alias(Firebase::class, 'firebase');
    }
}
