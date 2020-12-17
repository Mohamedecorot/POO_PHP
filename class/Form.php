<?php

/**
 * Class Form
 * Permet de générer un formulaire rapidement et simplement
 */
class Form{

    /**
     * @var array Données utilisées par le formulaire
     */
    protected $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'p';

    /**
     * @param array $data Données utilisées par le formulaire
     */
    public function __construct($data = array())
    {
        $this->data = $data;
    }

    /**
     * @param $name string
     * @return string
     */
    public function input($name)
    {
        return $this->surround('<input type="text" name="' . $name . '" value="' . $this->getValue($name). '">');
    }

    /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit">Envoyer</button>');
    }

    /**
     * @param  $html string Code HTML a entourer
     * @return string
     */
    protected function surround($html)
    {
        return "<{$this->surround}>$html</{$this->surround}>";
    }

    /**
     * @param $index string index de la valeur a récupérer
     * @return string
     */
    protected function getValue($index)
    {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }
}