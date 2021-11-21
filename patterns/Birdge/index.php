<?php

require __DIR__ . '/AbstractSender.php';
require __DIR__ . '/SenderPost.php';
require __DIR__ . '/SenderGet.php';
require __DIR__ . '/Provider.php';
require __DIR__ . '/TestSmsProvider.php';
require __DIR__ . '/BestSmsProvider.php';

//$providerSms = new TestSmsProvider();
$providerSms = new BestSmsProvider();
//$implementation  = new SenderPost($providerSms);
$implementation  = new SenderGet($providerSms);


$implementation->send(380965820233, 'Hello World!');
