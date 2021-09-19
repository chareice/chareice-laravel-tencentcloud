<?php

namespace Chareice\TencentCloud;

use Illuminate\Contracts\Foundation\Application;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/courier.php' => \config_path('tencent_cloud.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ ."../config/tencent_cloud.php", 'tencent_cloud');

        $this->app->singleton(Service::class, function (Application $app) {
            $config = $app->make('config');

            return new Service(
                $config['tencent_cloud.secret_id'],
                $config['tencent_cloud.secret_key'],
                $config['tencent_cloud.region']
            );
        });
    }
}