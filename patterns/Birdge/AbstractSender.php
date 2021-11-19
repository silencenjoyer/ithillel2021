<?php

declare(strict_types=1);

class AbstractSender
{
    protected SenderInterface $implementation;
    protected string $url = 'https://send.com';
    protected string $token = 'your_bearer_token';

    public function __construct(SenderInterface $implementation)
    {
        $this->implementation = $implementation;
    }

    public function operationSend(int $phone, string $text): void
    {
        $this->implementation->send($this->url, $this->token, $phone, $text);
    }
}
