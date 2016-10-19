<?php

namespace Devim\Provider\SmscServiceProvider;

use Devim\Provider\SmscServiceProvider\Checker\SmsChecker;
use Devim\Provider\SmscServiceProvider\Receiver\SmsReceiver;
use Devim\Provider\SmscServiceProvider\Sender\SmsSender;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class SmsServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $container
     */
    public function register(Container $container)
    {
        $container['sms.login'] = '';
        $container['sms.password'] = '';
        $container['sms.short_code'] = '';
        $container['sms.urls'] = [
            'sendUrl' => '',
            'receiveUrl' => '',
            'checkUrl' => ''
        ];

        $container['sms.sender'] = function () use ($container) {
            return new SmsSender($container['sms_request_service']);
        };

        $container['sms.receiver'] = function () use ($container) {
            return new SmsReceiver($container['sms_request_service']);
        };

        $container['sms.checker'] = function () use ($container) {
            return new SmsChecker($container['sms_request_service']);
        };
    }
}