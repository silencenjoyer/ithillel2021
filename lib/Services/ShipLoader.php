<?php

declare(strict_types=1);

class ShipLoader
{
    private PDO $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

        public function getShips(): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM ship");
        $statement->execute();
        $getShips = $statement->fetchAll(PDO::FETCH_ASSOC);

        $ships = [];
        foreach($getShips as $ship) {
            $ships[] = $this->dataToShip($ship);
        }
        return $ships;
    }

    public function find(int $id): ?Ship
    {
        $statement = $this->pdo->prepare('SELECT * FROM ship WHERE id = :id;');
        $statement->execute(['id' => $id]);
        $getShip = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$getShip) {
            return null;
        }

        return $this->dataToShip($getShip);
    }

    private function dataToShip($data): Ship
    {
        $ship = new Ship(
            $data['name'],
            (int) $data['weapon_power'],
            (int) $data['jedi_factor'],
            (int) $data['strength'],
        );
        $ship->setId((int) $data['id']);

        return $ship;
    }
}