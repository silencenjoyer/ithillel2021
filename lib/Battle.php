<?php

declare(strict_types=1);

class Battle
{
    private Ship $ship1;
    private Ship $ship2;
    private int $ship1Quantity;
    private int $ship2Quantity;

    public function __construct(Ship $ship1, int $ship1Quantity, Ship $ship2, int $ship2Quantity)
    {
        $this->ship1 = $ship1;
        $this->ship2 = $ship2;
        $this->ship1Quantity = $ship1Quantity;
        $this->ship2Quantity = $ship2Quantity;
    }

    public function battleResult(): array
    {
        $ship1Health = $this->ship1->getStrength() * $this->ship1Quantity;
        $ship2Health = $this->ship2->getStrength() * $this->ship2Quantity;

        $ship1UsedJediPowers = false;
        $ship2UsedJediPowers = false;

        while ($ship1Health > 0 && $ship2Health > 0) {
            if ($this->isJediDestroyShipUsingTheForce($this->ship1)) {
                $ship2Health = 0;
                $ship1UsedJediPowers = true;
    
                break;
            }
            if ($this->isJediDestroyShipUsingTheForce($this->ship2)) {
                $ship1Health = 0;
                $ship2UsedJediPowers = true;
    
                break;
            }
    
            $ship1Health -= ($this->ship2->getWeaponPower() * $this->ship1Quantity);
            $ship2Health -= ($this->ship1->getWeaponPower() * $this->ship2Quantity);
        }

        if ($ship1Health <= 0 && $ship2Health <= 0) {
            $winningShip = null;
            $losingShip = null;
            $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
        } elseif ($ship1Health <= 0) {
            $winningShip = $this->ship2;
            $losingShip = $this->ship1;
            $usedJediPowers = $ship2UsedJediPowers;
        } else {
            $winningShip = $this->ship1;
            $losingShip = $this->ship2;
            $usedJediPowers = $ship1UsedJediPowers;
        }

        return [
            'winning_ship' => $winningShip,
            'losing_ship' => $losingShip,
            'used_jedi_powers' => $usedJediPowers,
        ];
    }

    private function isJediDestroyShipUsingTheForce(Ship $ship): bool
    {
        return mt_rand(1, 100) <= $ship->getJediFactor();
    }
}
