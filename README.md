
# 概述

阿里通义万相(AI 图片模型)的非官方 PHP SDK

> 注: 本包仍在完善中，未来可能会有一些不兼容的更新。后续版本可能会加入通义千问等模型功能。

# 安装

通过 Composer 安装此包:

```bash
composer require icetalker/dashscope-php
```

# 用法

## 用法示例

示例如下：

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

## 查询作业结果

```php
$api_key = 'your-dashscope-api-key';

$task_id = '******';

$response = Dashscope::fetchTask($task_id, $api_key);

echo $response->getBody()->getContents();
```

## 其他

### 模型调用

通过 `Dashscope::{模型名}()` 方法，并传入对应模型的参数，即可调用相应模型：

```php

    $parameters = [
        'api_key'=>'your-dashscope-api-key',
        //... 
    ];

    Dashscope::imageSynthesis($parameters)//调用模型
        ->call();

```

可调用模型包括：

- imageSynthesis: [文本生成图像](https://help.aliyun.com/zh/dashscope/developer-reference/api-details-9)
- sketchImageSynthesis: [涂鸦作画](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-doodle)
- anytext: [Anytext 图文融合](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-anytext)
- backgroundGeneration: [图像背景生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-generating-backgrounds)
- cosplayImageGeneration: [Cosplay 动漫人物生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-cosplay-image-generation)
- styleRepaintImageGeneration: [人像风格重绘](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-style-repaint)

### 参数设置

设置参数时，所有 `input.*` 和 `parameters.*` 格式的参数都无需传入 `input.` 或 `parameters.` 前缀。所有的参数都通过数组形式传入，如下：

```php
$parameters = [
    'api_key' => $api_key, // api_key 为必填项
    'prompt' => 'A cat sitting on a park bench', // 其他必填项及可选参数请参考 Dashscope 文档
    //...
];
```

可用参数列表请参考 [Dashscope 文档](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang)，如下：

- [文本生成图像](https://help.aliyun.com/zh/dashscope/developer-reference/api-details-9)
- [涂鸦作画](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-doodle)
- [Anytext 图文融合](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-anytext)
- [图像背景生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-generating-backgrounds)
- [Cosplay 动漫人物生成](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-api-for-cosplay-image-generation)
- [人像风格重绘](https://help.aliyun.com/zh/dashscope/developer-reference/tongyi-wanxiang-style-repaint)

### 自定义 HTTP 客户端

```php
use GuzzleHttp\Client;

$client = new Client([
    //options ...
    'timeout' => 10,
    'proxy' => 'tcp://127.0.0.1:1080', // 使用代理
]);

$response = Dashscope::imageSynthesis($parameters)->withHttpClient($client)->call();

echo $response->getBody()->getContents();
```
