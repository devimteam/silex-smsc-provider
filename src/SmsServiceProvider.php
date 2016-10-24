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
        $container['smsc.login'] = '';
        $container['smsc.password'] = '';
        $container['smsc.short_code'] = '';
        $container['smsc.urls'] = [
            'sendUrl' => '',
            'receiveUrl' => '',
            'checkUrl' => ''
        ];

        $container['smsc.sender'] = function () use ($container) {
            return new SmsSender($container['sms_request_service']);
        };

        $container['smsc.receiver'] = function () use ($container) {
            return new SmsReceiver($container['sms_request_service']);
        };

        $container['smsc.checker'] = function () use ($container) {
            return new SmsChecker($container['sms_request_service']);
        };
    }
}