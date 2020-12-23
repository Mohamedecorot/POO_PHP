<?php
namespace App;

class Config {

    private $setting = [];
    private static $_instance;

    public function __construct()
    {
        $this->setting = require dirname(__DIR__) . '/config/config.php';
    }


}