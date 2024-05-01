<?php

namespace Icetalker\Dashscope;

use Icetalker\Dashscope\Config\ApiConfig;
use Icetalker\Dashscope\Parameters\BaseParam;

class DashscopeRequest{
    private BaseParam $param;

    public function __construct(BaseParam $param){
        $this->param = $param;
    }

    public function getApiKey(){
        return $this->param->getApiKey();
    }


    public function getHeaders(){
        return $this->param->getHeaders();

    }

    public function getHttpBody(){
        return $this->param->getHttpBody();
    }

    private function buildUri(){

        $baseUrl = ApiConfig::BASE_HTTP_API_URL . ApiConfig::VERSION;
        $model = $this->param->getModel();
        $uri = $model->uri();

        return $baseUrl . $uri;
    }

    public function getHttpUrl(){
        return $this->buildUri();
    }

}