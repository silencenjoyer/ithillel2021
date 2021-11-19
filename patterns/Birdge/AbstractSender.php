<?php

declare(strict_types=1);

class AbstractSender
{
    protected SenderInterface $implementation;

    public function __construct(SenderInterface $implementation)
    {
        $this->implementation = $implementation;
    }

    public function operationSend(int $phone, string $text): void
    {
        $this->implementation->send($phone, $text);
    }
}
