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
$app = App::getInstance();
$posts = $app->getTable('Posts');
var_dump($posts->all());