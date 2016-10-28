<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

interface SmsSenderInterface
{
    /**
     * @param string $phone
     * @param string $text
     * @param string $shortCode
     *
     * @return
     */
    public function send(string $phone, string $text, string $shortCode);
}