<?php

declare(strict_types=1);

class RandomStringDecorator implements RandomStringInterface
{
    protected RandomStringInterface $randomString;

    public function __construct(RandomStringInterface $randomString)
    {
        $this->randomString = $randomString;
    }

    public function getRandomString(int $length): string
    {
        return $this->randomString->getRandomString($length);
    }
}
