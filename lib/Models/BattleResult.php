<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winningShip = null;
    private ?Ship $losingShip = null;
    private ?Ship $ship1 = null;
    private ?Ship $ship2 = null;
    private bool $usedJediPowers = false;
    private int $winningHealth;
    private int $losingHealth;

    public function __construct(?Ship $winningShip, ?Ship $losingShip, Ship $Ship1, Ship $Ship2,  bool $usedJediPowers, int $winningHealth, int $losingHealth)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->ship1 = $Ship1;
        $this->ship2 = $Ship2;
        $this->usedJediPowers = $usedJediPowers;
        $this->winningHealth = $winningHealth;
        $this->losingHealth = $losingHealth;
    }

    public function getWinningShip(): ?Ship
    {
        return $this->winningShip;
    }

    public function isUsedJediPowers(): bool
    {
        return $this->usedJediPowers;
    }

    public function getLosingShip(): ?Ship
    {
        return $this->losingShip;
    } 

    public function getWinningHealth(): ?int
    {
        return $this->winningHealth;
    }
    
    public function getLosingHealth(): ?int
    {
        return $this->losingHealth;
    }

    public function getShip1(): Ship
    {
        return $this->ship1;
    }
    
    public function getShip2(): Ship
    {
        return $this->ship2;
    }
}
