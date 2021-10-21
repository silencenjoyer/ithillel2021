<?php

declare(strict_types=1);

class ShipLoader
{
        public function get_ships(): array
    {
        
        $result['starfighter'] = (new Ship())
            ->setName('Jedi Starfighter')
            ->setWeaponPower(5)
            ->setStrength(30)
            ->setJediFactor(15)
        ;

        $result['cloakshape_fighter'] = (new Ship())
            ->setName('CloakShape Fighter')
            ->setWeaponPower(2)
            ->setStrength(70)
            ->setJediFactor(2)
        ;

        $result['super_star_destroyer'] = (new Ship())
            ->setName('Super Star Destroyer')
            ->setWeaponPower(70)
            ->setStrength(500)
            ->setJediFactor(0)
        ;

        $result['rz1_a_wing_interceptor'] = (new Ship())
            ->setName('RZ-1 A-wing interceptor')
            ->setWeaponPower(4)
            ->setStrength(50)
            ->setJediFactor(4)
        ;
        
        return $result;
    }
}