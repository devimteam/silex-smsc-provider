<?php

namespace Devim\Provider\SmscServiceProvider\Exception;


class SmsProcessException extends \Exception
{
    public function __construct($status)
    {
        parent::__construct(sprintf('Error. SMS service answered with status "%s"', $status));
    }
}