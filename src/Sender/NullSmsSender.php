<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

class NullSmsSender implements SmsSenderInterface
{
    /**
     * @param string $phone
     * @param string $text
     */
    public function send(string $phone, string $text)
    {
        return;
    }

    /**
     * @param string $phone
     * @param string $smsId
     */
    public function check(string $phone, string $smsId)
    {
        return;
    }
}