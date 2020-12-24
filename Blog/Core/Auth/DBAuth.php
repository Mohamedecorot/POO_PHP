<?php
namespace Core\Auth;

use Core\Database\Database;

class DbAuth {

    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        var_dump($user);
    }

    public function logged()
    {
        return $_SESSION['auth'];
    }
}