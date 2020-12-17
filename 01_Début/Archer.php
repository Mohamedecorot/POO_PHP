<?php

use Personnage;

class Archer extends Personnage {

    protected $vie = 40;

    public function attaque($cible)
    {
        $cible->vie -= 2 * $this->atk;
        //parent::attaque($cible);
    }

}