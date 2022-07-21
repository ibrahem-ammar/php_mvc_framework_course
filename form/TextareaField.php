<?php 

namespace App\core\form;

use App\core\Model;

/**
 * 
 * @package App\core\form
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