<?php

declare(strict_types=1);

class BattleResult
{
    private ?object $winningShip = null;
    private ?object $losingShip = null;
    private bool $usedJediPowers = false;

    public function __construct(object $winningShip, object $losingShip, bool $usedJediPowers)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->usedJediPowers = $usedJediPowers;
    }

    public function getWinningShip()
    {
        return $this->winningShip;
    }

    public function isUsedJediPowers()
    {
        return $this->usedJediPowers;
    }

    public function getLosingShip()
    {
        return $this->losingShip;
    } 
}
