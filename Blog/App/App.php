<?php
namespace App;

use App\Database;

class App{

    private static $_instance;
    public $title = "Mon blog";

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?p=404');
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function setTitle($title)
    {
        self::$title = $title;
    }
}