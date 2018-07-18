<?php

namespace Devim\Provider\SmscServiceProvider\Options;

/**
 * Class CredentialsOption
 * @package Devim\Provider\SmscServiceProvider\Options
 */
class CredentialsOption implements Option
{
    /**
     * @var string
     */
    private $login = "";
    /**
     * @var string
     */
    private $password = "";

    /**
     * CredentialsOption constructor.
     *
     * @param string $login
     * @param string $password
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * @param array $options
     * @return array
     */
    public function apply(array $options): array
    {
        $options[CURLOPT_POSTFIELDS]["login"] = $this->login;
        $options[CURLOPT_POSTFIELDS]["psw"] = $this->password;

        return $options;
    }
}