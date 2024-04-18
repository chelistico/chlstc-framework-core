<?php

/**
 * User: chelistico
 * Date: 11/04/2024
 * Time: 22:37
 */

namespace chelistico\phpframeworkcore\form;

use chelistico\phpframeworkcore\Model;

/**
 * Class BaseField
 * 
 * @author chelistico <marcelovieyra@hotmail.com>
 * @package chelistico\phpframeworkcore\form
 */
abstract class BaseField
{
    public Model $model;
    public string $attribute;

    /**
     * Field constructor.
     * 
     * @param \chelistico\phpframeworkcore\Model $model
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
