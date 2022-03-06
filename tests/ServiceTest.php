<?php


namespace Tests;

use Chareice\TencentCloud\Service;
use TencentCloud\Ocr\V20181119\OcrClient;
use TencentCloud\Sms\V20210111\SmsClient;

class ServiceTest extends TestCase
{
    public function test_tencent_cloud_service()
    {
        $service = new Service('test', 'test2', 'tests');

        $this->assertInstanceOf(OcrClient::class, $service->OcrClient());
        $this->assertInstanceOf(SmsClient::class, $service->SmsClient());
    }

    public function test_container_resolve()
    {
        $service = app(Service::class);
        $this->assertInstanceOf(Service::class, $service);
    }
}