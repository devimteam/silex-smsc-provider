<?php

namespace Devim\Provider\SmscServiceProvider\Checker;

use Devim\Provider\SmscServiceProvider\Options\Option;

class NullSmsChecker implements SmsCheckerInterface
{
    /**
     * @param string $phone
     * @param string $smsId
     * @param Option ...$options
     *
     * @return array
     */
    public function check(string $phone, string $smsId, Option ...$options) : array
    {
        return [
            'status' => 1
        ];
    }
}