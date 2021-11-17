<?php

declare(strict_types=1);

class CurlRequest implements RequestInterface
{
    public function sendRequest(array $body, string $httpHeader): void
    {
        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://test.com',
            CURLOPT_POSTFIELDS => $body,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        $result = curl_exec($ch);
        echo $result;

        curl_close($ch);
    }
}