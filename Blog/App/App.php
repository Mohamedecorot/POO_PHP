<?php
namespace App;

use App\Config;
use App\Database;

class App{

    private static $_instance;
    public $title = "Mon blog";
    private $db_instance;

    // Singleton
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    // Factory
    public function getTable($name)
    {
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name();
    }

    public function getDb()
    {
        $config = Config::getInstance();
        if(is_null($this->db_instance)){
            return new Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
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