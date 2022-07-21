<?php 

namespace MvcFrameworkCourse\core\form;

use MvcFrameworkCourse\core\Model;

/**
 * 
 * @package MvcFrameworkCourse\core\form
 */

class TextareaField extends BaseField
{

    public function renderInput(): string
    {
        return sprintf(
            '<textarea name="%s" class="form-control %s" id="%s">%s</textarea>',
            $this->attribute,
            $this->model->hasError($this->attribute) ? 'is-invalid' : '',
            $this->attribute,
            $this->model->{$this->attribute},
        );
    }
}


?>