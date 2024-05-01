<?php
namespace Icetalker\Dashscope\Enums\Wanx;

enum ModelType: string
{
    case TEXT2IMAGE = 'wanx-v1';
    case STYLE_COSPLAY = 'wanx-style-cosplay-v1';
    case STYLE_REPAINT = 'wanx-style-repaint-v1';
    case BACKGROUND_GENERATION = 'wanx-background-generation-v2';
    case ANYTEXT = 'wanx-anytext-v1';
    case SKETCH2IMAGE = 'wanx-sketch-to-image-lite';

    public function uri(){

        return match($this){
            ModelType::TEXT2IMAGE => '/services/aigc/text2image/image-synthesis',
            ModelType::STYLE_COSPLAY, ModelType::STYLE_REPAINT => '/services/aigc/image-generation/generation',
            ModelType::BACKGROUND_GENERATION => '/services/aigc/background-generation/generation',
            ModelType::ANYTEXT => '/services/aigc/anytext/generation',
            ModelType::SKETCH2IMAGE => '/services/aigc/image2image/image-synthesis/',
        };
    }
    
}