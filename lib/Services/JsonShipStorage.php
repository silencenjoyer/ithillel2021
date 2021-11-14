<?php

declare(strict_types=1);

class JsonShipStorage implements ShipStorageInterface
{
    public function findOneById(int $id): ?AbstractShip
    {
        $ships = json_decode(
            file_get_contents('./resources/ships.json',
            true),
            true
        );

        foreach ($ships as $ship) {
            if ((int) $ship['id'] !== $id) {
                continue;
            }
            $result = $ship;
        }

        return $this->dataToShip($result);
    }

    public function fetchAll(): array
    {
        $shipsFormFile = json_decode(
            file_get_contents('./resources/ships.json',
            true),
            true
        );
        
        $ships = [];
        foreach($shipsFormFile as $ship) {
            $ships[] = $this->dataToShip($ship);        
        }

        return $ships;
    }

    private function dataToShip($data): AbstractShip
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