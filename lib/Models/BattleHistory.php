<?php

class BattleHistory
{
    private Ship $ship1;

    private Ship $ship2;

    private ?Ship $winningShip;

    private ?Ship $loosingShip;

    private int $quantShip1;

    private int $quantShip2;

    private int $winnerHealth;

    private int $looserHealth;

    private string $time;

    public function __construct(
        Ship $ship1,
        Ship $ship2,
        ?Ship $winningShip,
        ?Ship $loosingShip,
        int $quantShip1,
        int $quantShip2,
        int $winnerHealth,
        int $looserHealth,
        string $time
        ) {

        $this->ship1 = $ship1;
        $this->ship2 = $ship2;
        $this->winningShip = $winningShip;
        $this->loosingShip = $loosingShip;
        $this->quantShip1 = $quantShip1;
        $this->quantShip2 = $quantShip2;
        $this->winnerHealth = $winnerHealth;
        $this->looserHealth = $looserHealth;
        $this->time = $time;
    }

    public function getShip1(): Ship
    {
        return $this->ship1;
    }

    public function getShip2(): Ship
    {
        return $this->ship2;
    }

    public function getWinningShip(): ?Ship
    {
        return $this->winningShip;
    }

    public function getLoosingShip(): ?Ship
    {
        return $this->loosingShip;
    }

    public function getQuantShip1(): int
    {
        return $this->quantShip1;
    }

    public function getQuantShip2(): int
    {
        return $this->quantShip2;
    }

    public function getWinnerHealth(): int
    {
        return $this->winnerHealth;
    }

    public function getLooserHealth(): int
    {
        return $this->looserHealth;
    }

    public function getTime(): string
    {
        return $this->time;
    }
}
