<?php

class BattleHistory
{
    private AbstractShip $ship1;

    private AbstractShip $ship2;

    private ?AbstractShip $winningShip;

    private ?AbstractShip $loosingShip;

    private int $quantShip1;

    private int $quantShip2;

    private int $winnerHealth;

    private int $looserHealth;

    private string $time;

    public function __construct(
        AbstractShip $ship1,
        AbstractShip $ship2,
        ?AbstractShip $winningShip,
        ?AbstractShip $loosingShip,
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

    public function getShip1(): AbstractShip
    {
        return $this->ship1;
    }

    public function getShip2(): AbstractShip
    {
        return $this->ship2;
    }

    public function getWinningShip(): ?AbstractShip
    {
        return $this->winningShip;
    }

    public function getLoosingShip(): ?AbstractShip
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
