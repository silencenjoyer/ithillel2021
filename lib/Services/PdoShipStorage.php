<?php

declare(strict_types=1);

class PdoShipStorage implements ShipStorageInterface
{
    private PDO $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }

    public function findOneById(int $id): ?AbstractShip
    {
        $statement = $this->pdo->prepare('SELECT * FROM ship WHERE id = :id;');
        $statement->execute(['id' => $id]);
        $getShip = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$getShip) {
            return null;
        }

        return $this->dataToShip($getShip);
    }

    public function fetchAll(): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM ship");
        $statement->execute();

        $ships = [];
        foreach($statement->fetchAll() as $ship) {
            $ships[] = $this->dataToShip($ship);
        }
        
        return $ships;
    }

    private function dataToShip($data): Ship
    {
        if ($data['team'] === 'rebel') {
            $ship = new RebelShip($data['name']);
        } else {
            $ship = new Ship($data['name']);
        }
        $ship->setName($data['name'])
            ->setWeaponPower((int) $data['weapon_power'])
            ->setJediFactor((int) $data['jedi_factor'])
            ->setStrength((int) $data['strength'])
            ->setId((int) $data['id'])
        ;

        return $ship;
    }
}