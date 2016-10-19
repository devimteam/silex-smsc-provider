<?php

namespace Devim\Provider\SmscServiceProvider;

use Devim\Provider\SmscServiceProvider\Exception\SmsErrorException;
use Devim\Provider\SmscServiceProvider\Exception\SmsProcessException;

class SmsRequestService
{
    /**
     * @var string
     */
    private $login;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $shortCode;

    /**
     * @var array
     */
    private $urlMap;

    /**
     * SmsRequestService constructor.
     *
     * @param array $urls
     * @param string $login
     * @param string $password
     * @param string $shortCode
     */
    public function __construct(
        array $urls,
        string $login,
        string $password,
        string $shortCode
    )
    {
        $this->urlMap = [
            'send' => $urls['sendUrl'],
            'receive' => $urls['receiveUrl'],
            'check' => $urls['checkUrl']
        ];

        $this->login = $login;
        $this->password = $password;
        $this->shortCode = $shortCode;
    }

    /**
     * @param $method
     * @param $data
     *
     * @return array
     *
     * @throws SmsErrorException
     * @throws SmsProcessException
     */
    public function process($method, $data) : array
    {
        $data['login'] = $this->login;
        $data['psw'] = $this->password;

        if ($method === 'send') {
            $data['sender_id'] = $this->shortCode;
        }

        $ch = curl_init();

        $options = [
            CURLOPT_URL => $this->urlMap[$method],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data
        ];

        curl_setopt_array($ch, $options);

        $result = json_decode(iconv('CP1251', 'UTF-8', curl_exec($ch)), true);

        $status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($status !== 200) {
            throw new SmsProcessException($status);
        }

        if (array_key_exists('error', $result)) {
            throw new SmsErrorException($result['error']);
        }

        return $result;
    }
}