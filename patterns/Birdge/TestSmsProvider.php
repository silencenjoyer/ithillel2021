<?php

declare(strict_types=1);

class TestSmsProvider extends Provider
{
    public function setUrl(): Provider
    {
        $this->url = 'https://send.com';
    
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setToken(): Provider
    {
        $this->token = 'your_token';

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }
}
