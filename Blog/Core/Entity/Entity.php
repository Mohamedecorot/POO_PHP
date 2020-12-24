<?php
namespace Core\Entity;

class Entity {

    public function __get($key)
    {
        //methode magique
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}