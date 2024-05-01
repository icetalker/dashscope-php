<?php

namespace Icetalker\Dashscope\Exceptions;

class InvalidParameterException extends \Exception
{

    public function __construct(string $property, int $code = 0)
    {
        $msg = "Exception: Property \${$property} must not be null or empty!";

        parent::__construct($msg, $code);
    }

}