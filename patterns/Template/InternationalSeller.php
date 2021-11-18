<?php

declare(strict_types=1);

abstract class InternationalSeller
{
    final public function propositionAlgorithm(): void
    {
        $this->sayHello()
            ->introduceItem()
            ->countryProposition()
            ->currencyProposition();
    }

    protected function sayHello(): InternationalSeller
    {
        echo sprintf(
            "%s%s",
            'Hello, dear client! Nice to meet you here!',
            "\n"
        );

        return $this;
    }

    protected function introduceItem(): InternationalSeller
    {
        echo sprintf(
            "%s%s",
            'We present to you our new car, it has many advantages...',
            "\n"
        );

        return $this;
    }

    abstract protected function countryProposition(): InternationalSeller;

    abstract protected function currencyProposition(): InternationalSeller;
}
