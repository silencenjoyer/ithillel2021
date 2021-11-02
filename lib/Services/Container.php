<?php

declare(strict_types=1);

class Container
{
    private ?PDO $pdo = null;

    private ?BattleManager $battleManager = null;

    private ?ShipLoader $shipLoader = null;

    private ?BattleHistorySaver $battleHistorySaver = null;

    private ?BattleHistoryLoader $battleHistoryLoader = null;

    private array $configuration;


    public function __construct(array $configuration) 
    {
        $this->configuration = $configuration;
    }

    public function getPDO(): PDO
    {
        if ($this->pdo === null) {
            $this->pdo = new PDO(
                $this->configuration['db_dsn'],
                $this->configuration['db_user'],
                $this->configuration['db_psw']
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    public function getBattleManager(): BattleManager
    {
        if ($this->battleManager === null) {
            $this->battleManager = new BattleManager($this);
        }
        return $this->battleManager;
    }

    public function getShipLoader(): ShipLoader
    {
        if ($this->shipLoader === null) {
            $this->shipLoader = new shipLoader($this->getPDO());
        }
        return $this->shipLoader;
    }

    public function getBattleHistorySaver(): BattleHistorySaver
    {
        if ($this->battleHistorySaver === null) {
            $this->battleHistorySaver = new BattleHistorySaver(
                $this->getPDO()
            );
        }
        return $this->battleHistorySaver;
    }

    public function getBattleHistoryLoader(): BattleHistoryLoader
    {
        if ($this->battleHistoryLoader === null) {
            $this->battleHistoryLoader = new BattleHistoryLoader(
                $this->getPDO(),
                $this
            );
        }
        return $this->battleHistoryLoader;
    }
}
