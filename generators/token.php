<?php

require_once('TokenManager.php');
require_once('DB.php');

function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    // Uncomment one of the following alternatives
//     $bytes /= pow(1024, $pow);
     $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}


$before = memory_get_usage(true);
$token = new TokenManager();
$db = new DB();
$count = $db->getMaxId();

foreach ($token->partition($count, 500) as $query) {
    $db->setToken($query);
}


echo formatBytes(memory_get_usage(true) - $before);