<?php


namespace Chareice\TencentCloud;


use JetBrains\PhpStorm\Pure;
use TencentCloud\Common\Credential;
use TencentCloud\Common\Profile\ClientProfile;
use TencentCloud\Common\Profile\HttpProfile;
use TencentCloud\Ocr\V20181119\OcrClient;
use TencentCloud\Sms\V20210111\SmsClient;

/**
 * Class Service
 * @package Chareice\TencentCloud
 * @method OcrClient OcrClient()
 * @method SmsClient SmsClient()
 */
class Service
{
  protected array $clientEndpoint = [
    'Sms' => [
      'endpoint' => 'sms.tencentcloudapi.com',
      'clientClass' => SmsClient::class
    ],
    'Ocr' => [
      'endpoint' => 'ocr.tencentcloudapi.com',
      'clientClass' => OcrClient::class
    ]
  ];

  public function __construct(protected string $secretId, protected string $secretKey, protected string $region)
  {

  }

  protected function getCredential(): Credential
  {
    return new Credential($this->secretId, $this->secretKey);
  }

  public function __call(string $name, array $arguments)
  {
    if (str_ends_with($name, 'Client')) {
      return $this->getClientByName($name);
    }
  }

  protected function getClientByName(string $name)
  {
    $clientName = str_replace('Client', '', $name);

    $clientConfig = $this->clientEndpoint[$clientName];

    $httpProfile = new HttpProfile();
    $httpProfile->setEndpoint($clientConfig['endpoint']);

    $clientProfile = new ClientProfile();
    $clientProfile->setHttpProfile($httpProfile);
    $clientClassName = $clientConfig['clientClass'];
    return new $clientClassName($this->getCredential(), $this->region, $clientProfile);
  }

}