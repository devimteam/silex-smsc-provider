<?php

namespace Devim\Provider\SmscServiceProvider\Receiver;

use Devim\Provider\SmscServiceProvider\SmscRequestService;

class SmsReceiver
{
    const LAST_HOUR_RESULT = 1;
    const JSON_FORMAT = 3;

    /**
     * @var SmscRequestService
     */
    private $smsRequestService;

    /**
     * Receiver constructor.
     *
     * @param SmscRequestService $smsRequestService
     */
    public function __construct(SmscRequestService $smsRequestService)
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