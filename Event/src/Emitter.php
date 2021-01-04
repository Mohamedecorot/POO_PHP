<?php
namespace Event;

class Emitter {

    private static $_instance;
    /**
     * Enregistre la liste des écouteurs
     *
     * @var array
     */
    private $listeners = [];

    /**
     * Permet de recuperer l'instance de l'émetteur (singleton)
     * @return Emitter
     */
    public static function getInstance (): Emitter {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Envoie un événement
     *
     * @param string $event Nom de l'événement
     * @param array ...$args
     */
    public function emit(string $event, ...$args)
    {
        if ($this->hasListener($event)) {
            foreach ($this->listeners[$event] as $listener) {
                call_user_func_array($listener, $args);
            }
        }
    }

    /**
     * Permet d'écouter un événement
     *
     * @param string $event Nom de l'événement
     * @param callable $callable
     */
    public function on(string $event, callable $callable) {
        if (!$this->hasListener($event)) {
            $this->listeners[$event] = [];
        }
        $this->listeners[$event][] = $callable;
    }

    private function hasListener (string $event): bool {
        return array_key_exists($event, $this->listeners);
    }
}