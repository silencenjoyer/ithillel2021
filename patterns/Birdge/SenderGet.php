<?php

declare(strict_types=1);

class SenderGet implements SenderInterface
{
    public function send(int $phone, string $text): void
    {
        file_get_contents("https://send.com/sys/send.php?token=your_bearer_token&phones=$phone&text=$text");
    }
}
