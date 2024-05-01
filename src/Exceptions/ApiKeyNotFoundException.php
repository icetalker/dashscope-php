<?php

namespace Icetalker\Dashscope\Exceptions;

class ApiKeyNotFoundException extends \Exception
{

    public function __construct(string $message = "API KEY NOT FOUND", int $code = 0)
    {
        parent::__construct($message, $code);
    }

}