<?php

namespace NLDev\FormBuilder\Traits;

use NLDev\FormBuilder\Form;

trait FormTrait{
    use HasInputs;

    public function form(string $action, string $methhod = 'POST', bool $media = false, ?string $title = null){
        return  (new Form($action, $methhod, $media, $title));
    }

}
