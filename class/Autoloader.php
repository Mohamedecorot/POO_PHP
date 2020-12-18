<?php
namespace Tutoriel;

class Autoloader {

    static function autoload($class)
    {
        if(strpos($class, __NAMESPACE__ . '\\') === 0) {
            $class_name = str_replace(__NAMESPACE__ . '\\', '', $class);
            require 'class/' . $class_name . '.php';
        }
    }

    static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}