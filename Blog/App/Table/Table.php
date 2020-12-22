<?php
namespace App\Table;

use App\App;

class Table {

    protected static $table;


    public static function all()
    {
        return App::getDb()->query("
        SELECT *
        FROM " . static::$table ."
        ", get_called_class());
    }

    public function __get($key)
    {
        //methode magique
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}