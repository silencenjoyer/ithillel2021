<?php

declare(strict_types=1);

class SenderGet extends AbstractSender
{
    public function send(int $phone, string $text): void
    {var_dump($this->provider->getUrl(), $this->provider->getToken(), $phone, $text);die();
        $query = sprintf(
            '%s/send.php?token=%s&phones=%s&text=%s',
            $this->provider->getUrl(),
            $this->provider->getToken(),
            $phone,
            $text
        );

        file_get_contents($query);
    }
}
