<?php

declare(strict_types=1);

interface ShipStorageInterface
{
    public function findOneById(int $id): ?AbstractShip;

    public function fetchAll(): array;
}