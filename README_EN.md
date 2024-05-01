
# Overview

PHP SDK for Ali DashScope(AI Image Generator)

> Note: This package is still under development, and there may be some breaking changes in the future. Future versions may include features such as Tongyi Qianwen.

## Installation

Install the package via Composer:

```bash
composer require icetalker/dashscope-php
```

## Usage

## Usage Example

```php
use Dashscope\Dashscope;

$api_key = 'your-dashscope-api-key';

$parameters = [
    'api_key' => $api_key,
    'prompt' => 'Hello World!',
];

$response = Dashscope::imageSynthesis($parameters)->call();

echo $response->getBody()->getContents();
```

## Fetch Task Result

```php
$api_key = 'your-dashscope-api-key';

$task_id = '******';

$response = Dashscope::fetchTask($task_id, $api_key);

echo $response->getBody()->getContents();
```

## Other

### Models

Use the `Dashscope::{modelName}()` method, and pass in the corresponding model parameters, you can call the corresponding model:

```php

    $parameters = [
        'api_key'=>'your-dashscope-api-key',
        //... 
    ];

    Dashscope::imageSynthesis($parameters)//Model
        ->call();

```

Available Models include:

- imageSynthesis: [文本生成图像](https://help.aliyun.com/zh/dashscope/developer-reference/api-details-9)
- sketchImageSynthesis: [涂鸦作画](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-doodle)
- anytext: [Anytext 图文融合](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-anytext)
- backgroundGeneration: [图像背景生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-generating-backgrounds)
- cosplayImageGeneration: [Cosplay 动漫人物生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-cosplay-image-generation)
- styleRepaintImageGeneration: [人像风格重绘](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-style-repaint)

### Parameters Setting

When you are setting parameters, all `input.*` and `parameters.*` format parameters do not need to pass `input.` or `parameters.` prefix. All parameters are passed in as array, as follows:

```php
$parameters = [
    'api_key' => $api_key, // `api_key` is required field
    'prompt' => 'A cat sitting on a park bench', // Other required and optional parameters please see Dashscope Document
    //...
];
```

Available parameters list please see [Dashscope Document](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang), as follows:

- [文本生成图像](https://help.aliyun.com/zh/dashscope/developer-reference/api-details-9)
- [涂鸦作画](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-doodle)
- [Anytext 图文融合](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-anytext)
- [图像背景生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-generating-backgrounds)
- [Cosplay 动漫人物生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-cosplay-image-generation)
- [人像风格重绘](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-style-repaint)

### Custom Http Client

```php
use GuzzleHttp\Client;

$client = new Client([
    //options ...
    'timeout' => 10,
    'proxy' => 'tcp://127.0.0.1:1080', // use Proxy
]);

$response = Dashscope::imageSynthesis($parameters)
                ->withHttpClient($client)
                ->call();

echo $response->getBody()->getContents();
```
