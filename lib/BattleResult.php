<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winningShip = null;
    private ?Ship $losingShip = null;
    private bool $usedJediPowers = false;
    private ?int $winningHealth;
    private ?int $losingHealth;

    public function __construct(?Ship $winningShip, ?Ship $losingShip, bool $usedJediPowers, ?int $winningHealth, ?int $losingHealth)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->usedJediPowers = $usedJediPowers;
        $this->winningHealth = $winningHealth;
        $this->losingHealth = $losingHealth;
    }

    public function getWinningShip(): ?Ship
    {
        return $this->winningShip;
    }

    public function isUsedJediPowers():bool
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
}
