<?php
namespace App;

class Config {

    private $setting = [];
    private static $_instance;

    public function __construct()
    {
        $this->setting = require dirname(__DIR__) . '/config/config.php';
    }


    private static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new Config();
        }
        return self::$_instance;
    }


}