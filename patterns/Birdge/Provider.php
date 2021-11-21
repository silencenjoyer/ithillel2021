<?php

declare(strict_types=1);

abstract class Provider
{
    protected ?string $url = null;
    protected ?string $token = null;

    abstract public function setUrl(): Provider;

    abstract public function getUrl(): ?string;

    abstract public function setToken(): Provider;

    abstract public function getToken(): ?string;

}
