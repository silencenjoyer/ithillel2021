<?php

declare(strict_types=1);

class SenderPost implements SenderInterface
{
    public function send(string $url, string $token, int $phone, string $text): void
    {
        $data = json_encode([
            'phone' => [$phone],
            'message' => $text,
            'src_addr' => 'SenderName'
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $data,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $token,
                'Content-Type: application/json'
            ]
        ]);

        $result = curl_exec($ch);
        curl_close($ch);   
    }
}
