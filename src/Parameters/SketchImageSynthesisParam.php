<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;

class SketchImageSynthesisParam extends BaseParam
{

    protected ?array $requiredFields = ['prompt', 'sketchImageUrl'];

    //input
    protected ?string $sketchImageUrl = null;

    protected ?string $prompt = null;

    //parameters
    protected ?int $n = null;

    protected ?string $size = null;

    protected ?string $style = null;

    protected bool $sketchExtraction = false;

    protected ?array $sketchColor = null;

    public function __construct(?string $apiKey = null)
    {
        $this->model = ModelType::TEXT2IMAGE;
        $this->apiKey = $apiKey;
    }

    public function getInput()
    {
        $input = [];
        $input['prompt'] = $this->prompt;
        $input['sketch_image_url'] = $this->sketchImageUrl;

        return $input;
    }

    public function getParameters(): array
    {
        $parameters = [];

        if($this->sketchExtraction){
            $parameters['sketch_extraction'] = $this->sketchExtraction;
        }

        if(!$this->sketchExtraction && $this->sketchColor){
            $parameters['sketch_color'] = $this->sketchColor;
        }

        if($this->n){
            $parameters['n'] = $this->n;
        }
        if($this->size){
            $parameters['size'] = $this->size;
        }

        if($this->style){
            $parameters['style'] = $this->style;
        }

        return $parameters;
    }

}