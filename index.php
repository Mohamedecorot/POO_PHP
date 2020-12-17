<?php
require 'Personnage.php';

$merlin = new Personnage("Merlin");

// Si on veut faire crier le personnage :
$merlin->crier();

//Si on veut attribuer une nouvelle valeur à une propriété
$merlin->vie = 100;
//ou
$merlin->regenerer(5);

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