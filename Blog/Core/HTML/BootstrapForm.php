<?php
namespace Core\Html;

use Core\Html\Form;


class BootstrapForm extends Form
{

    /**
     * @param  $html string Code HTML a entourer
     * @return string
     */
    protected function surround($html)
    {
        return "<div class=\"form-group\">$html</div>";
    }
    /**
     * @param $name string
     * @param array $options
     * @return string
     */
    public function input($name, $label, $options = [])
    {
        $type = isset($options['type']) ? $options['type'] : 'text';
        return $this->surround(
            '<label>' . $label . '</label><input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name). '" class="form-control">');
    }

        /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}