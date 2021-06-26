<?php

namespace NLDev\FormBuilder\Inputs;

class Number extends Field{

    /**
     * Détermine si le champs peut contenir des valeurs négatives
     *
     * @var bool
     */
    public $negative = false;

    public $max = null;

    public $min = null;

    /**
     * Transform la valeur de $negative à true
     *
     * @return Field
     */
    public function negative(){
        $this->negative = true;
        return $this;
    }

    public function max(int $max){
        $this->max = $max;
        return $this;
    }

    public function min(int $min){
        $this->min = $min;
        return $this;
    }

}
