<?php

namespace NLDev\FormBuilder;

use Exception;
use Illuminate\Support\Facades\Route;

class Form
{
    /**
     * Array that contain all inputs of Form
     *
     * @var array
     */
    public $inputs = [];


    /**
     * Array that contain all form options
     *
     * @var array
     */
    public $options = ['media' => false, 'data' => null, 'title' => null, 'container_width' => 'is-6'];


    public function __construct(string $routename, string $methhod = 'POST', bool $media = false)
    {
        $this->routename($routename);
        $this->method($methhod);
        if ($media) {
            $this->hasMedia();
        }
    }

    public function __get($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : null;
    }

    public function __set($key, $value)
    {
        if (method_exists($this, $key)) {
            $this->$key($value);
        } else {
            if (property_exists($this, $key)) {
                return $this->$key;
            } else {
                throw new Exception("La method $key n'existe pas");
            }
        }
    }


    // Setters

    /**
     * Ajoute le modèle qui sera utiliser pour le formulaire
     *
     * @param object $data
     *
     * @return Form
     */
    public function data(object $data)
    {
        $this->options['data'] = $data;
        return $this;
    }

    /**
     * Set title to current form
     *
     * @param string|null $title
     *
     * @return Form
     */
    public function title(?string $title)
    {
        $this->options['title'] = ucfirst($title);
        return $this;
    }

    /**
     * Change form container width
     *
     * @param string $width
     *
     * @return Form
     */
    public function container_width(string $width)
    {
        $this->options['container_width'] = $width;
        return $this;
    }

    /**
     * Set form method @method($method)
     *
     * @param string $method
     *
     * @return Form
     */
    private function method(string $method = 'POST')
    {
        $method = strtoupper($method);
        if (in_array($method, ['POST', 'PUT', 'GET', 'PATCH'])) {
            $this->options['method'] = $method;
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
    public function hasMedia()
    {
        $this->options['media'] = true;
        return $this;
    }

    /**
     * Set form action routename
     *
     * @param string $routename
     *
     * @return Form
     */
    public function routename($routename)
    {
        if (is_string($routename)) {
            if (Route::has($routename)) {
                $this->options['routename'] = $routename;
            }
        } elseif (is_array($routename)) {
            $key = array_key_first($routename);
            $this->options['routename'] = $key;
            $this->parameters($routename[$key]);
        } else {
            throw new Exception("La route '{$routename}' n'extiste pas");
        }
        return $this;
    }

    public function parameters(array $parameters){
        $this->options['parameters']  = $parameters;
        return $this;
    }

    /**
     * Set submit button
     *
     * @param string $text
     * @param string $icon
     * @param array $classes
     *
     * @return Form
     */
    public function submit(string $text = 'Enregistrer', string $icon = 'save', array $classes = [])
    {
        $this->options['submit']['text'] = $text;
        $this->options['submit']['icon'] = $icon;
        $this->options['submit']['classes'] = $classes;
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
        if (!empty($this->inputs)) {
            $this->inputs = array_merge($inputs, $this->inputs);
        } else {
            $this->inputs = $inputs;
        }
        return $this;
    }

    /**
     * Render form stylsheet
     *
     * @return string
     */
    public function renderStyleSheet(): string
    {
        return '<link rel="stylesheet" href="' . asset('css/form.css') . '">';
    }

    /**
     * Render form javascript
     *
     * @return string
     */
    public function renderScript(): string
    {
        return '<script src="' . asset('js/form.js') . '"></script>';
    }

    /**
     * Render form view
     *
     * @return object
     */
    public function render(): object
    {
        $form = $this;
        return view('FormBuilder::form.form', compact('form'));
    }
}
