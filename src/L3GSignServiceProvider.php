<?php

namespace Axsor\L3GSign;

use Illuminate\Support\ServiceProvider;

class L3GSignServiceProvider extends ServiceProvider
{

    protected $configPath = '/../config/3gsign.php';

    /**
     * Registering L3GSign config without publishing it
     */
    public function boot()
    {
        if ($this->app['config']->get('l3gsign') === null)
        {
            $this->app['config']->set('l3gsign', require __DIR__ . $this->configPath);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('l3gsign', function () {
            return new L3GSign;
        });
    }
}
