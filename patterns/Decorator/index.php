<?php

require __DIR__ . '/RandomStringInterface.php';
require __DIR__ . '/RandomString.php';
require __DIR__ . '/RandomStringDecorator.php';
require __DIR__ . '/CyrillicRandomStringDecorator.php';

$result = [];
$basic = new RandomString();

$result[] = (new RandomStringDecorator($basic))
    ->getRandomString(15);
$result[] = (new CyrillicRandomStringDecorator($basic))
->getRandomString(15);

var_dump($result);
