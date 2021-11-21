<?php

declare(strict_types=1);

class BestSmsProvider extends Provider
{
    public function setUrl(): Provider
    {
        $this->url = 'https://bestsms.com';
    
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setToken(): Provider
    {
        $this->token = 'your_token2';

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }
}
