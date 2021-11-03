<?php

declare(strict_types=1);

class BrokenShip extends AbstractShip
{
    public function isFunctional(): bool
    {
        return false;
    }

    public function getType(): string
    {
        return 'Broken';
    }
}