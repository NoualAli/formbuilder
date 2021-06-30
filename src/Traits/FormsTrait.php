<?php

namespace NLDev\FormBuilder\Traits;

use NLDev\FormBuilder\Form;

trait FormsTrait{
    use HasInputs;

    public function form(string $action, string $methhod = 'POST', bool $media = false, ?string $title = null){
        $form = (new Form($action, $methhod, $media, $title));
        if(!isset($this->options['forms'])){
            $this->options['forms'] = [$form];
        }else{
            array_push($this->options['forms'], $form);
        }
        return  $form;
    }

}
