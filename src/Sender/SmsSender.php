<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

use Devim\provider\SmscServiceProvider\SmsRequestService;

class SmsSender implements SmsSenderInterface
{
    const JSON_FORMAT = 3;

    private $smsRequestService;

    /**
     * Sender constructor.
     *
     * @param SmsRequestService $smsRequestService
     */
    public function __construct(SmsRequestService $smsRequestService)
    {
        $this->smsRequestService = $smsRequestService;
    }

    /**
     * @param string $phone
     * @param string $text
     *
     * @return array
     */
    public function send(string $phone, string $text) : array
    {
        $data = [
            'phones' => $phone,
            'mes' => $text,
            'fmt' => self::JSON_FORMAT
        ];

        return $this->smsRequestService->process('send', $data);
    }
}