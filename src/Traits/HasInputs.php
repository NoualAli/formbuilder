<?php

namespace NLDev\FormBuilder\Traits;

trait HasInputs{

    public function input(string $type, string $name, string $label = null, bool $required = false){
        $classType = 'NLDev\FormBuilder\Inputs\\'.ucfirst($type);
        return  (new $classType($type, $name, $label, $required));
    }
}
