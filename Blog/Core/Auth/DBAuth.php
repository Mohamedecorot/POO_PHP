<?php
namespace Core\Auth;

use Core\Database\Database;

class DbAuth {

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }


}