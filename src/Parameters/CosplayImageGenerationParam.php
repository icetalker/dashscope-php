<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;

class CosplayImageGenerationParam extends BaseParam
{
    protected ?array $requiredFields = ['faceImageUrl', 'templateImageUrl', 'modelIndex'];

    protected ?string $faceImageUrl = null;

    protected ?string $templateImageUrl = null;

    protected ?string $modelIndex = null;

    public function __construct(?string $apiKey = null)
    {
        $this->model = ModelType::STYLE_COSPLAY;
        $this->apiKey = $apiKey;
    }

    public function getInput()
    {
        $input = [];
        
        $input['face_image_rl'] = $this->faceImageUrl;
        $input['templuate_image_url'] = $this->templateImageUrl;
        $input['model_index'] = 1;

        return $input;
    }

    public function getParameters(): array
    {
        return [];
    }

    public function setHeader($key, $value){

    }

}