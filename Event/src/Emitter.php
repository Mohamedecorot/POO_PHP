<?php
namespace Event;

use Event\Listener;

class Emitter {

    private static $_instance;
    /**
     * Enregistre la liste des écouteurs
     *
     * @var Listener[][]
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
                $listener->handle($args);
                if ($listener->stopPropagation) {
                    break;
                }
            }
        }
    }

    /**
     * Permet d'écouter un événement
     *
     * @param string $event Nom de l'événement
     * @param callable $callable
     * @param int $priority
     * @return Listener
     */
    public function on(string $event, callable $callable, int $priority = 0): Listener
    {
        if (!$this->hasListener($event)) {
            $this->listeners[$event] = [];
        }
        $this->checkDoubleCallableForEvent($event, $callable);
        $listener = new Listener($callable, $priority);
        $this->listeners[$event][] = $listener;
        return $listener;
    }

    /**
     * Permet d'écouter un évènement et de lancer le listener une seule fois
     *
     * @param string $event
     * @param callable $callable
     * @param int $priority
     * @return Listener
     */
    public function once(string $event, callable $callable, int $priority = 0): Listener
    {
        return $this->on($event, $callable, $priority)->once();
    }

    /**
     * Permet d'ajouter un subscriber qui va écouter plusieurs évènements
     *
     * @param SubscriberInterface $subscriber
     */
    public function addSubscriber(SubscriberInterface $subscriber)
    {
        $events = $subscriber->getEvents();
        foreach($events as $event => $method) {
            $this->on($event, [$subscriber, $method]);
        }
    }

    private function hasListener (string $event): bool {
        return array_key_exists($event, $this->listeners);
    }

    private function sortListeners($event)
    {
        uasort($this->listeners[$event], function ($a, $b) {
            return $a->priority < $b->priority;
        });
    }

    private function checkDoubleCallableForEvent (string $event, callable $callable): bool
    {
        foreach ($this->listerners[$event] as $listener) {
            if ($listener->callback === $callable) {
                throw new DoubleEventException();
            }
        }
        return false;
    }
}