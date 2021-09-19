<?php


namespace Tests;


use Chareice\TencentCloud\ServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('tencent_cloud', [
            'secret_id' => 'test',
            'secret_key' => 'test',
            'region' => 'test'
        ]);
    }
}