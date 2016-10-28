<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

class NullSmsSender implements SmsSenderInterface
{
    /**
     * @param string $phone
     * @param string $text
     * @param string $shortCode
     */
    public function send(string $phone, string $text, string $shortCode)
    {
        return;
    }
}