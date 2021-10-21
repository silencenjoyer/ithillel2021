<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winningShip = null;
    private ?Ship $losingShip = null;
    private bool $usedJediPowers = false;

    public function __construct(?Ship $winningShip, ?Ship $losingShip, bool $usedJediPowers)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->usedJediPowers = $usedJediPowers;
    }

    public function getWinningShip()
    {
        return $this->winningShip;
    }

    public function isUsedJediPowers():bool
    {
        return $this->usedJediPowers;
    }

    public function getLosingShip()
    {
        return $this->losingShip;
    } 
}
