<?php

declare(strict_types=1);

class BattleHistoryLoader
{
    private PDO $pdo;

    private Container $container;

    public function __construct(PDO $pdo, Container $container)
    {
        $this->pdo = $pdo;
        $this->container = $container;
    }

    public function loadHistory($from, $to)
    {
        $statement = $this->pdo->prepare("SELECT * FROM battle_history ORDER BY id DESC LIMIT $from, $to");
        $statement->execute();
        $history = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (!$history) {
            return null;
        }
        $items  = [];
        foreach ($history as $item) {
            $items[] = $this->dbToItem($item);
        }

        return $items;
    }

    private function dbToItem($data)
    {
        $winner = null;
        $looser = null;
        $ship1 = $this->container
            ->getShipStorage()
            ->findOneById((int) $data['ship1_id']);
        $ship2 = $this->container
            ->getShipStorage()
            ->findOneById((int) $data['ship1_id']);
        
            if ($data['winner_ship_id'] !== null) {
            $winner = $this->container
                ->getShipStorage()
                ->findOneById((int) $data['winner_ship_id']);
            $looser = $this->container
                ->getShipStorage()
                ->findOneById((int) $data['defeat_ship_id']);
        }

        $history = new BattleHistory(
            $ship1,
            $ship2,
            $winner !== null ? $winner : null,
            $looser !== null ? $looser : null,
            (int) $data['ship1_quantity'],
            (int) $data['ship2_quantity'],
            (int) $data['winner_health'],
            (int) $data['defeat_health'],
            (string) $data['time']
        );
        return $history;
    }

    public function countHistory()
    {
        $statement = $this->pdo->prepare("SELECT COUNT(id) as `All` FROM battle_history");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
}
