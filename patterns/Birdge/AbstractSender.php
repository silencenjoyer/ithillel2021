<?php

declare(strict_types=1);

abstract class AbstractSender
{
    protected Provider $provider;

    public function __construct(Provider $provider)
    {
        $this->provider = $provider;
        $this->provider->setUrl()
            ->setToken();
    }

    abstract public function send(int $phone, string $text): void;
}
