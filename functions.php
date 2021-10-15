<?php
require_once('autoload.php');

function get_ships(): array
{
    
    $result['starfighter'] = new Ship();
    $result['starfighter']->setName('Jedi Starfighter')
        ->setWeaponPower(5)
        ->setStrength(30)
        ->setJediFactor(15)
    ;

    $result['cloakshape_fighter'] = new Ship();
    $result['cloakshape_fighter']->setName('CloakShape Fighter')
        ->setWeaponPower(2)
        ->setStrength(70)
        ->setJediFactor(2)
    ;

    $result['super_star_destroyer'] = new Ship();
    $result['super_star_destroyer']->setName('Super Star Destroyer')
        ->setWeaponPower(70)
        ->setStrength(500)
        ->setJediFactor(0)
    ;

    $result['rz1_a_wing_interceptor'] = new Ship();
    $result['rz1_a_wing_interceptor']->setName('RZ-1 A-wing interceptor')
        ->setWeaponPower(4)
        ->setStrength(50)
        ->setJediFactor(4)
    ;
    
    return $result;
}
