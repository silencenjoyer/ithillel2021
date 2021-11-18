<?php

declare(strict_types=1);

class CanadianSeller extends InternationalSeller
{
    protected function countryProposition(): InternationalSeller
    {
        echo sprintf(
            "%s%s",
            'Great Canadian day! This car will transfer you from Quebec to Yukon for several days!',
            "\n"
        );

        return $this;
    }

    protected function currencyProposition(): InternationalSeller
    {
        echo sprintf("%s%s",
        'The price for you is only 20 000 CAD!',
        "\n"
        );

        return $this;
    }
}
