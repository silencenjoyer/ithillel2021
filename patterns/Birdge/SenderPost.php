<?php

declare(strict_types=1);

class SenderPost extends AbstractSender
{
    public function send(int $phone, string $text): void
    {
        $data = json_encode([
            'phone' => [$phone],
            'message' => $text,
            'src_addr' => 'SenderName'
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->provider->getUrl(),
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $this->provider->getToken(),
                'Content-Type: application/json'
            ]
        ]);

        $result = curl_exec($ch);
        curl_close($ch);   
    }
}
