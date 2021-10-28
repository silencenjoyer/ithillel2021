<?php

declare(strict_types=1);

class BattleManager
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function battle(
        Ship $ship1,
        int $ship1Quantity,
        Ship $ship2,
        int $ship2Quantity): BattleResult
    {
        $ship1Health = $ship1->getStrength() * $ship1Quantity;
        $ship2Health = $ship2->getStrength() * $ship2Quantity;

        $ship1UsedJediPowers = false;
        $ship2UsedJediPowers = false;

        while ($ship1Health > 0 && $ship2Health > 0) {
            if ($this->isJediDestroyShipUsingTheForce($ship1)) {
                $ship2Health = 0;
                $ship1UsedJediPowers = true;
    
                break;
            }
            if ($this->isJediDestroyShipUsingTheForce($ship2)) {
                $ship1Health = 0;
                $ship2UsedJediPowers = true;
    
                break;
            }
    
            $ship1Health -= ($ship2->getWeaponPower() * $ship1Quantity);
            $ship2Health -= ($ship1->getWeaponPower() * $ship2Quantity);
        }

        if ($ship1Health <= 0 && $ship2Health <= 0) {
            $winningShip = null;
            $losingShip = null;
            $winningHealth = $ship1Health;
            $losingHealth = $ship2Health;
            $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
        } elseif ($ship1Health <= 0) {
            $winningShip = $ship2;
            $losingShip = $ship1;
            $winningHealth = $ship2Health;
            $losingHealth = $ship1Health;
            $usedJediPowers = $ship2UsedJediPowers;
        } else {
            $winningShip = $ship1;
            $losingShip = $ship2;
            $winningHealth = $ship1Health;
            $losingHealth = $ship2Health;
            $usedJediPowers = $ship1UsedJediPowers;
        }

        $this->container->getBattleHistorySaver()
            ->saveBattleResult(
                $ship1->getId(),
                $ship2->getId(),
                $winningShip !== null ? $winningShip->getId() : null,
                $losingShip !== null ? $losingShip->getId() : null,
                $ship1Quantity,
                $ship2Quantity,
                $winningHealth,
                $losingHealth
            );

        return new BattleResult(
            $winningShip,
            $losingShip,
            $ship1, 
            $ship2,
            $usedJediPowers,
            $winningHealth,
            $losingHealth
        );
    }

    private function isJediDestroyShipUsingTheForce(Ship $ship): bool
    {
        return mt_rand(1, 100) <= $ship->getJediFactor();
    }
}
