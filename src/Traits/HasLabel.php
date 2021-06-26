<?php

namespace NLDev\FormBuilder\Traits;

use NLDev\FormBuilder\Label;

trait HasLabel{

    public function label(string $label, string $input, bool $required = false){
        return  new Label($label, $input, $required);
    }
}
