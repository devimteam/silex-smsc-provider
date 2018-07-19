<?php

namespace Devim\Provider\SmscServiceProvider\Checker;

use Devim\Provider\SmscServiceProvider\Options\Option;

interface SmsCheckerInterface
{
    /**
     * @param string $phone
     * @param string $smsId
     * @param Option ...$options
     *
     * @return array
     */
    public function check(string $phone, string $smsId, Option ...$options) : array;
}