<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;

class ImageSynthesisParam extends BaseParam
{
    protected ?array $requiredFields = ['prompt'];

    //input
    protected ?string $prompt = null;

    protected ?string $negativePrompt = null;

    //parameters
    protected ?int $n = null;

    protected ?string $size = null;

    protected ?int $steps = null;
    
    protected ?int $scale = null;

    protected ?int $seed = null;

    protected ?string $style = null;

    public function __construct($apiKey = null)
    {
        $this->model = ModelType::TEXT2IMAGE;
        $this->apiKey = $apiKey;
    }

    public function getInput()
    {
        $input = [];
        $input['prompt'] = $this->prompt;
        if($this->negativePrompt){
            $input['negative_prompt'] = $this->negativePrompt;
        }
        return $input;
    }

    public function getParameters(): array
    {
        $parameters = [];

        if($this->n){
            $parameters['n'] = $this->n;
        }
        if($this->size){
            $parameters['size'] = $this->size;
        }
        if($this->negativePrompt){
            $parameters['negative_prompt'] = $this->negativePrompt;
        }
        if($this->steps){
            $parameters['steps'] = $this->steps;
        }
        if($this->scale){
            $parameters['scale'] = $this->scale;
        }
        if($this->seed){
            $parameters['seed'] = $this->seed;
        }

        if($this->style){
            $parameters['style'] = $this->style;
        }

        return $parameters;
    }

}