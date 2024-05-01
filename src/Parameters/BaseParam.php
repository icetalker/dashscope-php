<?php 

namespace Icetalker\Dashscope\Parameters;

use Closure;
use Icetalker\Dashscope\DashscopeRequest;
use Icetalker\Dashscope\Enums\Wanx\ModelType;
use Icetalker\Dashscope\Exceptions\InvalidParameterException;

abstract class BaseParam {

    protected ?Closure $exceptionHandler = null;

    protected ?array $requiredFields = null;

    protected ?string $apiKey = null;

    protected ?ModelType $model = null;

    protected ?array $headers = null;

    public function __call($method, $value)
    {
        if(preg_match("/^get([a-z]+[a-z0-9]*)$/i", $method, $matches)){
            $property = str_replace('get', '', $method);
            $property = lcfirst($property);
            return $this->{$property};
        }elseif(preg_match("/^set([a-z]+[a-z0-9]*)$/i", $method, $matches)){
            $property = str_replace('set', '', $method);
            $property = lcfirst($property);
            // $this->checkProperty($property);
            $this->{$property} = $value[0];
            return $this;
        }
    }

    public function getHeaders(): array
    {
        $headers = DashscopeHeader::buildHeaders($this->apiKey);

        if($this->headers){
            $headers = [
                ...$headers,
                ...$this->headers
            ];
        }

        return $headers;
    }

    public function setHeader($key, $value){
        $this->headers[$key] = $value;
    }

    public function getHttpBody()
    {
        $body = [];
        $body['model'] = $this->getModel();
        $body['input'] = $this->getInput();
        if ($this->getParameters()) {
            $body['parameters'] = $this->getParameters();
        }
        return $body;
    }

    public function buildRequest(){
        $this->validate();
        return new DashscopeRequest($this);
    }

    public abstract function getInput();
    
    public abstract function getParameters();

    public function validate(){
        if($this->requiredFields){
            foreach($this->requiredFields as $field){
                
                if(!$this->{$field}){
                    if($this->exceptionHandler){
                        set_exception_handler($this->exceptionHandler);
                    }
                    throw new InvalidParameterException($field);
                }
            }
        }
    }

}

