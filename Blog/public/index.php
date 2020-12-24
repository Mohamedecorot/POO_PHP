<?php

// use App\Autoloader;

// require '../App/Autoloader.php';
// Autoloader::register();

// if (isset($_GET['p'])) {
//     $p = $_GET['p'];
// } else {
//     $p = 'home';
// }

// //initialisation des objets
// //$db = new Database('blog');

// ob_start();
// if($p === 'home') {
//     require '../pages/home.php';
// } elseif ($p === 'article') {
//     require '../pages/article.php';
// } elseif ($p === 'categorie') {
//     require '../pages/categorie.php';
// }


// $content = ob_get_clean();
// require '../pages/templates/default.php';

//$config = App\Config::getInstance();

//$app = App\App::getInstance();
//$app->titre = "titre test";

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 'home';
}

ob_start();
if($page === 'home') {
    require ROOT . '/pages/articles/home.php';
}

$content = ob_get_clean();
require ROOT . '/pages/template/default.php';

