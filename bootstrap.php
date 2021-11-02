<?php

declare(strict_types=1);

$configuration = [
    'db_dsn' => 'mysql:host=176.37.72.204;dbname=users_school',
    'db_user' => 'se',
    'db_psw' => 'bingo',
];

require __DIR__ . '/lib/Services/Container.php';
require __DIR__ . '/lib/Models/Ship.php';
require __DIR__ . '/lib/Services/ShipLoader.php';
require __DIR__ . '/lib/Services/BattleManager.php';
require __DIR__ . '/lib/Models/BattleHistory.php';
require __DIR__ . '/lib/Services/BattleHistorySaver.php';
require __DIR__ . '/lib/Services/BattleHistoryLoader.php';
require __DIR__ . '/lib/Models/BattleResult.php';

$container = new Container($configuration);
