<?php

namespace Icetalker\Dashscope\Parameters;

class DashscopeHeader{

    public static function buildHeaders(string $apiKey, ?array $customHeaders = null)
    {
        $headers = [
            "Content-Type" => 'application/json',
            'Authorization' => 'Bearer ' . $apiKey,
            'X-DashScope-Async' => 'enable',
        ];

        if($customHeaders){
            $headers = [
                ...$headers,
                ...$customHeaders
            ];
        }
        
        return $headers;
    }
}