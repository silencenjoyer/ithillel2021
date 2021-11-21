<?php

require __DIR__ . '/AbstractSender.php';
require __DIR__ . '/SenderPost.php';
require __DIR__ . '/SenderGet.php';
require __DIR__ . '/Provider.php';
require __DIR__ . '/TestSmsProvider.php';
require __DIR__ . '/BestSmsProvider.php';
require __DIR__ . '/ProviderContext.php';

$providerSms = new TestSmsProvider();
//$providerSms = new BestSmsProvider();

$context = new ProviderContext($providerSms);
$implementation = $context->chooseSendMethod(ProviderContext::SEND_GET);
//$implementation = $context->chooseSendMethod(ProviderContext::SEND_POST);

$implementation->send(380965820233, 'Hello World!');
