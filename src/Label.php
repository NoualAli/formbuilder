<?php

namespace NLDev\FormBuilder;

class Label{

    /**
     * Label text
     *
     * @var string
     */
    private $text = '';

    /**
     * Required label
     *
     * @var bool
     */
    private $required = false;

    /**
     * Label input
     *
     * @var string
     */
    private $input = '';

    public function __construct(string $text, string $input, bool $required = false)
    {
        $this->text($text);
        $this->required($required);
        $this->input($input);
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($key, $value){
        if(method_exists($this, $key)){
            $this->$key($value);
        }else{
            $this->$key = $value;
        }
    }

    public function input(string $input){
        $this->input = $input;
    }

    public function required(bool $required){
        $this->required = $required;
    }

    public function text(string $text){
        $this->text = ucfirst(strtolower($text));
    }
}
