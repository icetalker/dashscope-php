<?php

namespace Icetalker\Dashscope;

use Icetalker\Dashscope\Parameters\AnytextParam;
use Icetalker\Dashscope\Parameters\BackgroundGenerationParam;
use Icetalker\Dashscope\Parameters\CosplayImageGenerationParam;
use Icetalker\Dashscope\Parameters\ImageSynthesisParam;
use Icetalker\Dashscope\Parameters\SketchImageSynthesisParam;
use Icetalker\Dashscope\Parameters\StyleRepaintImageGenerationParam;

class Dashscope{

    /**
     * @param array $config
     * @return DashscopeClient
     */
    public static function imageSynthesis(array $config){

        $config = array_merge([
            'prompt' => null,
            'negative_prompt' => null,
            'n' => 1,
            'size' => null,
            'steps' => null,
            'scale' => null,
            'seed' => null,
            'style' => null,
        ], $config);

        $param = (new ImageSynthesisParam())
                ->setApiKey($config['api_key'])
                ->setPrompt($config['prompt'])
                ->setN($config['n'])
                ->setSize($config['size'])
                ->setSteps($config['steps'])
                ->setScale($config['scale'])
                ->setSeed($config['seed'])
                ->setStyle($config['style']);

        // $param = $param->buildRequest();

        return new DashscopeClient($param);
    }

    public static function sketchImageSynthesis(array $config){

        $config = array_merge([
            'prompt' => null,
            'sketch_image_url' => null,
            'n' => 1,
            'size' => null,
            'style' => null,
            'sketch_extraction' => false,
            'sketch_color' => null,
        ], $config);

        $param = (new SketchImageSynthesisParam())
                ->setApiKey($config['api_key'])
                ->setPrompt($config['prompt'])
                ->setSketchImageUrl($config['sketch_image_url'])
                ->setN($config['n'])
                ->setSize($config['size'])
                ->setStyle($config['style'])
                ->setSketchExtraction($config['sketch_extraction'])
                ->setSketchColor($config['sketch_color']);

        return new DashscopeClient($param);
    }

    public static function anytext(array $config){

        $config = array_merge([
            'prompt' => null,
            'mask_image_url' => null,
            'base_image_url' => null,
            'appended_prompt' => null,
            'negative_prompt' => null,
            'layout_priority' => null,
            'text_position_revise' => null,
            'n' => 1,
            'steps' => null,
            'image_width' => null,
            'image_height' => null,
            'strength' => null,
            'cfg_scale' => null,
            'eta' => null,
            'seed' => null,
        ], $config);

        $param = (new AnytextParam())
            ->setApiKey($config['api_key'])
            ->setPrompt($config['prompt'])
            ->setMaskImageUrl($config['mask_image_url'])
            ->setBaseImageUrl($config['base_image_url'])
            ->setAppendedPrompt($config['appended_prompt'])
            ->setNegativePrompt($config['negative_prompt'])
            ->setLayoutPriority($config['layout_priority'])
            ->setTextPositionRevise($config['text_position_revise'])
            ->setN($config['n'])
            ->setSteps($config['steps'])
            ->setImageWidth($config['image_width'])
            ->setImageHeight($config['image_height'])
            ->setStrength($config['strength'])
            ->setCfgScale($config['cfg_scale'])
            ->setEta($config['eta'])
            ->setSeed($config['seed']);

        return new DashscopeClient($param);
    }

    public static function backgroundGeneration(array $config){
        
        $config = array_merge([
            'base_image_url' => null,
            'ref_image_url' => null,
            'ref_prompt' => null,
            'neg_ref_prompt' => null,
            'foreground_edge' => null,
            'background_edge' => null,
            'title' => null,
            'sub_title' => null,
            'n' => 1,
            'noise_level' => null,
            'ref_prompt_weight' => null,
            'scene_type' => null,

        ], $config);

        $param = (new BackgroundGenerationParam())
            ->setApiKey($config['api_key'])
            ->setBaseImageUrl($config['base_image_url'])
            ->setRefImageUrl($config['ref_image_url'])
            ->setRefPrompt($config['ref_prompt'])
            ->setNegRefPrompt($config['neg_ref_prompt'])
            ->setForegroundEdge($config['foreground_edge'])
            ->setBackgroundEdge($config['background_edge'])
            ->setTitle($config['title'])
            ->setSubTitle($config['sub_title'])
            ->setN($config['n'])
            ->setNoiseLevel($config['noise_level'])
            ->setRefPromptWeight($config['ref_prompt_weight'])
            ->setSceneType($config['scene_type']);

        return new DashscopeClient($param);

    }

    public static function cosplayImageGeneration(array $config){
        $config = array_merge([
            'face_image_url' => null,
            'template_image_url' => null,
            'model_index' => null,
        ], $config);

        $param = (new CosplayImageGenerationParam())
            ->setApiKey($config['api_key'])
            ->setFaceImageUrl($config['face_image_url'])
            ->setTemplateImageUrl($config['template_image_url'])
            ->setModelIndex($config['model_index']);
        
        return new DashscopeClient($param);
    }

    public static function styleRepaintImageGeneration(array $config){
        $config = array_merge([
            'image_url' => null,
            'style_index' => null,
        ], $config);

        $param = (new StyleRepaintImageGenerationParam())
            ->setApiKey($config['api_key'])
            ->setImageUrl($config['image_url'])
            ->setStyleIndex($config['style_index']);
        
        return new DashscopeClient($param);
    }

    public static function fetchTask($task_id, $api_key){

        $response = (new DashscopeClient())->fetch($task_id, $api_key);
        
        return $response;
    }

}