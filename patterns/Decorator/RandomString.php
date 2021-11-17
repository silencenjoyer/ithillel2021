<?php

declare(strict_types=1);

class RandomString implements RandomStringInterface
{
    public function getRandomString(int $length): string
    {
        $result = '';
        $st = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        for ($i=1; $i <= $length; $i++) {
            $result .= $st[mt_rand(0,51)];
        }

        return $result;
    }
}
