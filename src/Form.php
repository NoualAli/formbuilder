<?php

namespace NLDev\FormBuilder;

use Exception;

class Form
{
    /**
     * Form method
     * @var string
     */
    private $method = '';

    /**
     * Form media
     *
     * @var bool
     */
    private $media = false;

    /**
     * Form action
     *
     * @var string
     */
    private $action = '';

    /**
     * Form submit
     *
     * @var array
     */
    private $submit = [];

    /**
     * Form title
     *
     * @var string
     */
    private $title = '';

    /**
     * Array that contain all inputs of Form
     *
     * @var array
     */
    private $inputs = [];


    public function __construct(string $action, string $methhod = 'POST', bool $media = false, ?string $title = null)
    {
        $this->action($action);
        $this->method($methhod);
        $this->title($title);
        if ($media) {
            $this->hasMedia();
        }
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

    // Setters

    public function title(?string $title){
        $this->title = ucfirst($title);
    }

    /**
     * Specify form method
     *
     * @param string $method
     *
     * @return Form
     */
    private function method(string $method = 'POST')
    {
        $method = strtoupper($method);
        if (in_array($method, ['POST', 'PUT', 'GET', 'PATCH'])) {
            $this->method = $method;
            return $this;
        } else {
            throw new Exception("La méthode $method n'existe pas");
        }
    }

    /**
     * Specify if form has media to add `enctype="multipart/form-data"` header
     *
     * @return Form
     */
    private function hasMedia()
    {
        $this->media = true;
        return $this;
    }

    private function action(string $action)
    {
        if (filter_var($action, FILTER_VALIDATE_URL)) {
            $this->action = $action;
            return $this;
        } else {
            throw new Exception("L'action spécifier ne contient pas une URL valide : $action");
        }
    }

    public function submit(string $text = 'Enregistrer', string $icon = 'save', array $classes = [])
    {
        $this->submit['text'] = $text;
        $this->submit['icon'] = $icon;
        $this->submit['classes'] = $classes;
        return $this;
    }

    /**
     * Add new Input to Form
     *
     * @param mixed $input
     *
     * @return Form
     */
    public function add(array $inputs)
    {
        if(!empty($this->inputs)){
            $this->inputs = array_merge($inputs, $this->inputs);
        }else{
            $this->inputs = $inputs;
        }
        return $this;
    }

    public function render(){
        $form = $this;
        return view('FormBuilder::form.form', compact('form'));
    }
}
