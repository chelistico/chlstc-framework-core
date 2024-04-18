<?php

/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 22:54
 */

namespace chelistico\phpframeworkcore\form;

/**
 * Class TextareaField
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore\form
 */
class TextareaField extends BaseField
{
    public function renderInput(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-control %s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->{$this->attribute}
        );
    }
}
