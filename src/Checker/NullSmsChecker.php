<?php

namespace Devim\Provider\SmscServiceProvider\Checker;

class NullSmsChecker implements SmsCheckerInterface
{
    /**
     * @param string $phone
     * @param string $smsId
     *
     * @return array
     */
    public function check(string $phone, string $smsId) : array
    {
        return [
            'status' => 1
        ];
    }
}