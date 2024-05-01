<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;

class StyleRepaintImageGenerationParam extends BaseParam
{
    protected ?array $requiredFields = ['imageUrl', 'styleIndex'];

    //style_cosplay
    protected ?string $imageUrl = null;

    protected ?string $styleIndex = null;

    public function __construct(?string $apiKey = null)
    {
        $this->model = ModelType::STYLE_REPAINT;
        $this->apiKey = $apiKey;
    }

    public function getInput()
    {
        $input = [];

        $input['image_url'] = $this->imageUrl;

        $input['style_index'] = $this->styleIndex;

        return $input;
    }

    public function getParameters(): array
    {
        return [];
    }

}