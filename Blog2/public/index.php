<?php

use App\Database;
use App\Autoloader;

require '../app/Autoloader.php';
Autoloader::register();

if(isset($_GET['p'])){
    $p = $_GET['p'];
} else {
    $p = 'home';
}

// Initialisation de la bdd
//$db = new Database('blog');


ob_start();
if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';
} elseif ($p === 'categorie') {
    require '../pages/categorie.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';