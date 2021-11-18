<?php

require __DIR__ . '/InternationalSeller.php';
require __DIR__ . '/UkrainianSeller.php';
require __DIR__ . '/CanadianSeller.php';

$seller = (new CanadianSeller())
    ->propositionAlgorithm();
    