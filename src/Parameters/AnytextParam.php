<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;

class AnytextParam extends BaseParam
{
    protected ?array $requiredFields = ['prompt', 'maskImageUrl'];
    
    //input
    protected ?string $prompt = null; //required

    protected ?string $maskImageUrl = null; //required

    protected ?string $baseImageUrl = null;

    protected ?string $appendedPrompt = null;

    protected ?string $negativePrompt = null;

    //parameters
    protected ?string $layoutPriority = null;

    protected ?bool $textPositionRevise = null;

    protected ?int $n = null;

    protected ?int $steps = null;

    protected ?int $imageWidth = null;

    protected ?int $imageHeight = null;

    protected ?float $strength = null;

    protected ?float $cfgScale = null;

    protected ?float $eta = null;

    protected ?int $seed = null;

    public function __construct(?string $apiKey = null)
    {
        $this->model = ModelType::ANYTEXT;
        $this->apiKey = $apiKey;
    }

    public function getInput()
    {
        $input = [];
        $input['prompt'] = $this->prompt;
        $input['mask_image_url'] = $this->maskImageUrl;
        if($this->baseImageUrl){
            $input['base_image_url'] = $this->baseImageUrl;
        }
        if($this->appendedPrompt){
            $input['append_prompt'] = $this->appendedPrompt;
        }
        if($this->negativePrompt){
            $input['negative_prompt'] = $this->negativePrompt;
        }

        return $input;
    }

    public function getParameters(): array
    {
        $parameters = [];

        if($this->layoutPriority){
            $parameters['layout_priority'] = $this->layoutPriority;
        }

        if($this->textPositionRevise){
            $parameters['text_position_revise'] = $this->textPositionRevise;
        }

        if($this->n){
            $parameters['n'] = $this->n;
        }
        if($this->steps){
            $parameters['steps'] = $this->steps;
        }

        if($this->imageWidth){
            $parameters['image_width'] = $this->imageWidth;
        }

        if($this->imageHeight){
            $parameters['image_height'] = $this->imageHeight;
        }

        if($this->strength){
            $parameters['strength'] = $this->strength;
        }

        if($this->cfgScale){
            $parameters['cfg_scale'] = $this->cfgScale;
        }

        if($this->eta){
            $parameters['eta'] = $this->eta;
        }

        if($this->seed){
            $parameters['seed'] = $this->seed;
        }

        return $parameters;
    }

}