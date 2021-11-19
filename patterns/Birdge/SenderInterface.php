<?php

declare(strict_types=1);

interface SenderInterface
{
    public function send(string $url, string $token, int $phone, string $text): void;
} 
