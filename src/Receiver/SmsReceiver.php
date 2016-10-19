<?php

namespace Devim\Provider\SmscServiceProvider\Receiver;

use Devim\Provider\SmscServiceProvider\SmsRequestService;

class SmsReceiver
{
    const LAST_HOUR_RESULT = 1;
    const JSON_FORMAT = 3;

    /**
     * @var SmsRequestService
     */
    private $smsRequestService;

    /**
     * Receiver constructor.
     *
     * @param SmsRequestService $smsRequestService
     */
    public function __construct(SmsRequestService $smsRequestService)
    {

        $this->smsRequestService = $smsRequestService;
    }

    /**
     * @return array
     */
    public function receive() : array
    {
        $data = [
            'get_answers' => 1,
            'fmt' => self::JSON_FORMAT,
            'hour' => self::LAST_HOUR_RESULT
        ];

        return $this->smsRequestService->process('receive', $data);
    }
}