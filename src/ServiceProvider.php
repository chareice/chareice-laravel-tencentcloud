<?php

namespace Chareice\TencentCloud;

use Illuminate\Contracts\Foundation\Application;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
  public function register()
  {
    $this->app->singleton(Service::class, function (Application $app) {
      $config = $app->make('config');

      return new Service(
        $config['service.tencent_cloud.secret_id'],
        $config['service.tencent_cloud.secret_key'],
        $config['service.tencent_cloud.region']
      );
    });
  }
}