<?php

namespace Devim\Provider\SmscServiceProvider\Checker;

use Devim\Provider\SmscServiceProvider\SmscRequestService;

class SmsChecker implements SmsCheckerInterface
{
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
     * @param string $phone
     * @param string $smsId
     *
     * @return array
     */
    public function check(string $phone, string $smsId) : array
    {
        $data = [
            'phone' => $phone,
            'id' => $smsId,
            'fmt' => self::JSON_FORMAT
        ];

        return $this->smsRequestService->process('check', $data);
    }
}