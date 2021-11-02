<?php

declare(strict_types=1);

class BattleHistorySaver
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function saveBattleResult(
        int $ship1_id,
        int $ship2_id,
        ?int $winningShip_id,
        ?int $losingShip_id,
        int $ship1Quantity,
        int $ship2Quantity,
        int $winningHealth,
        int $losingHealth
        ) {
        $statement = $this->pdo->prepare(
            "INSERT INTO `battle_history` 
            (`ship1_id`,`ship2_id`,`winner_ship_id`,`defeat_ship_id`,`ship1_quantity`,`ship2_quantity`,`winner_health`,`defeat_health`)
            VALUES
            (:ship1_id, :ship2_id, :winningShip_id, :losingShip_id, :ship1Quantity, :ship2Quantity, :winningHealth, :losingHealth)"
        );
        $statement->execute([
            ':ship1_id' => (int) $ship1_id,
            ':ship2_id' => $ship2_id,
            ':winningShip_id' => $winningShip_id,
            ':losingShip_id' => $losingShip_id,
            ':ship1Quantity' => $ship1Quantity,
            ':ship2Quantity' => $ship2Quantity,
            ':winningHealth' => $winningHealth,
            ':losingHealth' => $losingHealth
        ]);
    }
}
