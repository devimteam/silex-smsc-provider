<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

interface SmsSenderInterface
{
    /**
     * @param string $phone
     * @param string $text
     */
    public function send(string $phone, string $text);
}