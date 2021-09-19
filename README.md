# Laravel Tencent Cloud
腾讯云服务 Laravel 接口封装

## 安装
```bash
composer require chareice/laravel-tencentcloud
```


## 配置
```bash
$ php artisan vendor:publish --provider="Chareice\\TencentCloud\\ServiceProvider" --tag=config
```

## 使用
```php
$service = app(Chareice\TencentCloud\Service::class);
// 获取到ocrClient
$ocrClient = $service->OcrClient();
```