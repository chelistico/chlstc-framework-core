<?php

/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 22:37
 */

namespace app\core\form;

use app\core\Model;

/**
 * Class BaseField
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package app\core\form
 */
abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * Field constructor.
     * 
     * @param \app\core\Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf(
            '
            <div class="form-group">
                <div class="mb-3">
                    <label>%s</label>
                    %s
                    <div class="invalid-feedback">
                        %s
                    </div>
                </div>
            </div>
        ',
            $this->model->getLabel($this->attribute) ?? $this->attribute,
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}
