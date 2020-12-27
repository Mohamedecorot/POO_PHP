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
        $label = '<label>' . $label . '</label>';
        if($type === 'textarea') {
            $input = '<textarea name="' . $name . '" class="form-control">' . $this->getValue($name). '</textarea>';
        } else {
            $input = '<input type="' . $type . '" name="' . $name . '" value="' . $this->getValue($name). '" class="form-control">';
        }
        return $this->surround($label . $input);
    }

    public function select($nom, $label, $option)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<select class="form-control" name=' . $name . '">';
        foreach($options as $k => $v){
            $input .= "<option value '$k'>$v</option>";
        }
    }

        /**
     * @return string
     */
    public function submit()
    {
        return $this->surround('<button type="submit" class="btn btn-primary">Envoyer</button>');
    }
}