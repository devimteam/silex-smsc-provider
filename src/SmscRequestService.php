<?php

namespace Devim\Provider\SmscServiceProvider;

use Devim\Provider\SmscServiceProvider\Exception\SmsErrorException;
use Devim\Provider\SmscServiceProvider\Exception\SmsProcessException;
use Devim\Provider\SmscServiceProvider\Options\Option;

class SmscRequestService
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
     * @var array
     */
    private $urlMap;

    /**
     * SmsRequestService constructor.
     *
     * @param array $urls
     * @param string $login
     * @param string $password
     */
    public function __construct(
        array $urls,
        string $login,
        string $password
    )
    {
        $this->urlMap = [
            'send' => $urls['sendUrl'],
            'receive' => $urls['receiveUrl'],
            'check' => $urls['checkUrl']
        ];

        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @param $method
     * @param $data
     * @param $opts
     *
     * @return array
     *
     * @throws SmsErrorException
     * @throws SmsProcessException
     */
    public function process($method, $data, Option ...$opts) : array
    {
        $data['login'] = $this->login;
        $data['psw'] = $this->password;

        $ch = curl_init();

        $options = [
            CURLOPT_URL => $this->urlMap[$method],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_CONNECTTIMEOUT => 15,
            CURLOPT_TIMEOUT => 20,
        ];

        foreach ($opts as $option) {
            $options = $option->apply($options);
        }

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