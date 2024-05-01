<?php

namespace Icetalker\Dashscope;

use GuzzleHttp\Client;
use Icetalker\Dashscope\Parameters\BaseParam;

class DashscopeClient{

    protected Client $client;

    protected ?BaseParam $param = null;

    public function __construct(?BaseParam $param = null)
    {
        $this->client = new Client();

        if($param){
            $this->param = $param;
        }
        
    }

    public function withHttpClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }

    public function call(?BaseParam $param = null){

        $request = $param ? $param->buildRequest() : $this->param->buildRequest();
        
        $response = $this->send($request);

        return $response;
    }

    //
    public function send(DashscopeRequest $request){

        $request = $request ?: $this->param->buildRequest();

        $response = $this->client->request('POST', $request->getHttpUrl(), [
            'headers' => $request->getHeaders(),
            'json' => $request->getHttpBody(),
        ]);

        return $response;
    }

    public function fetch($task_id, $apiKey){

        $url = "https://dashscope.aliyuncs.com/api/v1/tasks/{$task_id}";

        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ]
        ]);

        return $response;
    }


}