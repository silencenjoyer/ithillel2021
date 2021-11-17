<?php

declare (strict_types=1);

interface RandomStringInterface
{
    public function getRandomString(int $length): string;
}
