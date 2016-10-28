<?php

namespace Devim\Provider\SmscServiceProvider\Sender;

use Devim\provider\SmscServiceProvider\SmscRequestService;

class SmsSender implements SmsSenderInterface
{
    const JSON_FORMAT = 3;

    private $smsRequestService;

    /**
     * Sender constructor.
     *
     * @param SmscRequestService $smsRequestService
     */
    public function __construct(SmscRequestService $smsRequestService)
    {
        $this->smsRequestService = $smsRequestService;
    }

    /**
     * @param string $phone
     * @param string $text
     *
     * @return array
     */
    public function send(string $phone, string $text, string $shortCode) : array
    {
        $data = [
            'phones' => $phone,
            'mes' => $text,
            'fmt' => self::JSON_FORMAT,
            'sender' => $shortCode
        ];

        return $this->smsRequestService->process('send', $data);
    }
}