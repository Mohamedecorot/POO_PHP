<?php
namespace Tutoriel;

use Tutoriel\Autoloader;
use Tutoriel\Personnage;
require 'class/Autoloader.php';
Autoloader::register();

$merlin = new Personnage("Merlin");
$legolas = new Archer('Legolas');

// Si on veut faire crier le personnage :
$merlin->crier();

//Si on veut attribuer une nouvelle valeur à une propriété
//$merlin->vie = 100;
//ou
$merlin->regenerer(5);

echo $merlin->getVie();

//si on a un nouvel objet (personnage), il est indépendant des autres objets

// sans constructeur
//$harry = new Personnage();
//$harry->nom = "Harry";

// Avec constructeur
$harry = new Personnage("Harry");
$harry->regenerer();

$merlin->attaque($harry);

if($harry->mort()) {
    echo 'Harry est mort';
} else {
    echo 'Harry a survécu avec ' . $harrt->vie . ' de vie';
}

//test de configuration