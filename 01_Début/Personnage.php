<?php

class Personnage{

    const MAX_VIE = 100;

    private $vie = 80;
    private $atk = 20;
    private $name;
    private $age = 30;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    // les getters permettent de retourner des propriétés privées
    public function getAge()
    {
        return $this->age;
    }

    public function getNom()
    {
        return $this->nom;
    }

    // les setters c'est comme les getters mais en sens inverse
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getVie()
    {
        return $this->vie;
    }

    public function getAtk()
    {
        return $this->atk;
    }
    public function crier()
    {
        echo "A l'attaque!";
    }

    public function regenerer($vie = null)
    {
        if(is_null($vie)) {
            //$this faire référence à l'instance en cours
            $this->vie = self::MAX_VIE;
        } else {
            $this->vie = $this->vie + $vie;
            // équivalent à $this->vie += $vie;
        }
    }

    public function mort(): bool
    {
        return $this->vie <= 0;
    }

    public function attaque($cible)
    {
        /*$this attaquant
        $cible défenseur
        defenseur.vie -= attaquant.atk*/
        $cible->vie -= $this->atk;
    }
}