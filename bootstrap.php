<?php

declare(strict_types=1);

$configuration = [
    'db_dsn' => 'mysql:host=176.37.72.204;dbname=users_school',
    'db_user' => 'se',
    'db_psw' => 'bingo',
    "ship_storage" => 'json' //json | db
];

require __DIR__ . '/lib/Services/ShipStorageInterface.php';
require __DIR__ . '/lib/Services/PdoShipStorage.php';
require __DIR__ . '/lib/Services/JsonShipStorage.php';
require __DIR__ . '/lib/Services/Container.php';
require __DIR__ . '/lib/Models/AbstractShip.php';
require __DIR__ . '/lib/Models/Ship.php';
require __DIR__ . '/lib/Models/RebelShip.php';
require __DIR__ . '/lib/Models/BrokenShip.php';
require __DIR__ . '/lib/Services/ShipLoader.php';
require __DIR__ . '/lib/Services/BattleManager.php';
require __DIR__ . '/lib/Models/BattleHistory.php';
require __DIR__ . '/lib/Services/BattleHistorySaver.php';
require __DIR__ . '/lib/Services/BattleHistoryLoader.php';
require __DIR__ . '/lib/Models/BattleResult.php';

$container = new Container($configuration);
