<?php

use App\Database;
use App\Autoloader;

require '../App/Autoloader.php';
Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

//initialisation des objets
$db = new Database('blog');

ob_start();
if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/article.php';
}

$content = ob_get_clean();
require '../pages/templates/default.php';