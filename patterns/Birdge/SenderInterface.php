<?php

declare(strict_types=1);

interface SenderInterface
{
    public function send(int $phone, string $text): void;
} 
