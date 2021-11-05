<?php

declare(strict_types=1);

class BattleResult
{
    private ?AbstractShip $winningShip = null;
    private ?AbstractShip $losingShip = null;
    private ?AbstractShip $ship1 = null;
    private ?AbstractShip $ship2 = null;
    private bool $usedJediPowers = false;
    private int $winningHealth;
    private int $losingHealth;

    public function __construct(?AbstractShip $winningShip, ?AbstractShip $losingShip, AbstractShip $Ship1, AbstractShip $Ship2,  bool $usedJediPowers, int $winningHealth, int $losingHealth)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->ship1 = $Ship1;
        $this->ship2 = $Ship2;
        $this->usedJediPowers = $usedJediPowers;
        $this->winningHealth = $winningHealth;
        $this->losingHealth = $losingHealth;
    }

    public function getWinningShip(): ?AbstractShip
    {
        return $this->winningShip;
    }

    public function isUsedJediPowers(): bool
    {
        return $this->usedJediPowers;
    }

    public function getLosingShip(): ?AbstractShip
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

    public function getShip1(): AbstractShip
    {
        return $this->ship1;
    }
    
    public function getShip2(): AbstractShip
    {
        return $this->ship2;
    }
}
