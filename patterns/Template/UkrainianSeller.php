<?php

declare(strict_types=1);

class UkrainianSeller extends InternationalSeller
{
    protected function countryProposition(): InternationalSeller
    {
        echo sprintf(
            "%s%s",
            'You can buy it on all over Ukrainian territory. It will transfer you from Kyiv to Lviv for several of hour!',
            "\n"
        );

        return $this;
    }

    protected function currencyProposition(): InternationalSeller
    {
        echo sprintf("%s%s",
        'The price for you is only 400 000 UAH!',
        "\n"
        );

        return $this;
    }
}
