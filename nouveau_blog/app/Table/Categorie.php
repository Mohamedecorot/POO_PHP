<?php
namespace App\Table;

use App\App;

class Categorie{

    private static $table = 'categorie';

    public static function all()
    {
        return App::getDb()->query("
            SELECT *
            FROM {self::$table}
        ", __CLASS__);
    }
}