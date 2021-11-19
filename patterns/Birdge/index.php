<?php

require __DIR__ . '/AbstractSender.php';
require __DIR__ . '/SenderInterface.php';
require __DIR__ . '/SenderPost.php';
require __DIR__ . '/SenderGet.php';


$implementation  = new SenderPost();
//$implementation  = new SenderGet();
$abstraction = new AbstractSender($implementation);

$abstraction->operationSend(380965820233, 'Hello World!');
