<?php

namespace Devim\Provider\SmscServiceProvider\Checker;

interface SmsCheckerInterface
{
    /**
     * @param string $phone
     * @param string $smsId
     *
     * @return array
     */
    public function check(string $phone, string $smsId) : array;
}