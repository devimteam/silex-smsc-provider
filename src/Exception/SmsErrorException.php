<?php

namespace Devim\Provider\SmscServiceProvider\Exception;

class SmsErrorException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}