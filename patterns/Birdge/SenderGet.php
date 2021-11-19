<?php

declare(strict_types=1);

class SenderGet implements SenderInterface
{
    public function send(string $url, string $token, int $phone, string $text): void
    {
        file_get_contents("$url/sys/send.php?token=$token&phones=$phone&text=$text");
    }
}
