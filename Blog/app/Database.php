<?php
namespace App;

use \PDO;

class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = 'root', $db_host = 'localhost')
    {
        $this->db_user = $db_user;
        $this->db_name = $db_name;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function query($statement)
    {
        $resultat = $this->getPDO()->query($statement);
        //pour récuperer les articles
        $datas = $resultat->fetchAll(PDO::FETCH_OBJ);
        return $datas;
    }

    private function getPDO()
    {
        if($this->pdo === null) {
            //pour se connecter à la bdd
            $pdo = new PDO ('mysql:dbname=blog;host=localhost', 'root', 'root');

            //pour voir les erreurs
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }
        return $pdo;
    }
}