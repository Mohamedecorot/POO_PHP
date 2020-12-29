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

if(isset($_GET['p'])){
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}

$page = explode('.', $page);
if($page[0] == 'admin'){
    $controller = '\App\Controller\admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action = $page[1];

}
$controller = new $controller();
$controller->$action();


//ob_start();
// if($page === 'home') {
//     $controller = new \App\Controller\PostsController();
//     $controller->index();
// } elseif ($page === 'posts.category') {
//     $controller = new \App\Controller\PostsController();
//     $controller->category();
// } elseif ($page === 'posts.show') {
//     $controller = new \App\Controller\PostsController();
//     $controller->show();
// } elseif ($page === 'login') {
//     $controller = new \App\Controller\UsersController();
//     $controller->login();
// } elseif ($page === 'admin.posts.index') {
//     $controller = new \App\Controller\Admin\PostsController();
//     $controller->index();
// }

// $content = ob_get_clean();
// require ROOT . '/pages/templates/default.php';

