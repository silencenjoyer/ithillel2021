<?php 

declare(strict_types=1);

interface RequestInterface
{
    public function sendRequest(array $body, string $httpHeader): void;
}