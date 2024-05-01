<?php

namespace Icetalker\Dashscope\Parameters;

use Icetalker\Dashscope\Enums\Wanx\ModelType;
use Icetalker\Dashscope\Exceptions\PropertyNotFoundException;

class BackgroundGenerationParam extends BaseParam
{
    protected ?array $requiredFields = ['baseImageUrl'];

    // inputs
    protected ?string $baseImageUrl = null; //required

    protected ?string $refImageUrl = null; //required if $refPrompt is empty

    protected ?string $refPrompt = null; //required if $refImageUrl is empty

    protected ?string $negRefPrompt = null;

    protected ?string $foregroundEdge = null; //referenceEdge

    protected ?string $backgroundEdge = null; //referenceEdge

    protected ?string $title = null;

    protected ?string $subTitle = null;

    //parameters
    protected ?int $n = null;

    protected ?int $noiseLevel = null;

    protected ?int $refPromptWeight = null;
    
    protected ?int $sceneType = null;

    public function __construct(?string $apiKey = null)
    {
        $this->model = ModelType::BACKGROUND_GENERATION;
        $this->apiKey = $apiKey;
    }

    public function getInput(): array
    {
        $input = [];

        // $this->validate();

        $input['base_image_url'] = $this->baseImageUrl;

        if($this->refImageUrl){
            $input['ref_image_url'] = $this->refImageUrl;
        }
        if($this->refPrompt){
            $input['ref_prompt'] = $this->refPrompt;
        }
        if($this->negRefPrompt){
            $input['neg_ref_prompt'] = $this->negRefPrompt;
        }
        if($this->backgroundEdge){
            $input['reference_edge'] = [
                'background_edge' => $this->backgroundEdge
            ];
        }
        if($this->foregroundEdge){
            $input['reference_edge'] = [
                'foreground_edge' => $this->foregroundEdge
            ];
        }
        if($this->title){
            $input['title'] = $this->title;
        }
        if($this->subTitle){
            $input['sub_title'] = $this->subTitle;
        }

        return $input;
    }

    public function getParameters(): array
    {
        $parameters = [];

        if($this->n){
            $parameters['n'] = $this->n;
        }
        if($this->noiseLevel){
            $parameters['noise_level'] = $this->noiseLevel;
        }
        if($this->refPromptWeight){
            $parameters['ref_prompt_weight'] = $this->refPromptWeight;
        }
        if($this->sceneType){
            $parameters['scene_type'] = $this->sceneType;
        }

        return $parameters;
    }


    //@override
    public function validate()
    {
        //RGBA validation
        $imagePath = $this->baseImageUrl;
        $info = getimagesize($imagePath);
        if($info['channels'] != 4){
            throw new \Exception('Base image require RGBA format');
        }

        if(!$this->refImageUrl&&!$this->refPrompt){
            throw new PropertyNotFoundException('ref_image_url or ref_prompt 至少输入一个!');
        }
    }

}