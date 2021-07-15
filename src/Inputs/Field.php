<?php

namespace NLDev\FormBuilder\Inputs;

use NLDev\FormBuilder\Traits\HasLabel;

abstract class Field
{
    use HasLabel;

    /**
     * Nom du champ
     * @var string
     */
    private $name;

    /**
     * Label du champ
     * @var Label
     */
    private $label;

    /**
     * Type du champ
     * @var string
     */
    private $type;

    /**
     * Valeur du champ
     * @var string|null
     */
    private $value;

    /**
     * Tableau des options du champ
     * @var array
     */
    private $options = [];

    /**
     * @var bool
     */
    private $required = false;

    /**
     * Tableau des class additionnels du champ
     * @var array
     */
    private $classes = [];

    public function __construct(string $type, string $name, ?string $label = null, bool $required = false)
    {
        if($label){
            $this->label = $this->label($label, $name, $required);
        }
        $this->required = $required;
        $this->name($name)->type($type);

        return $this;
    }

    public function __get($name)
    {
        if(property_exists($this, $name)){
            return $this->$name;
        }else{
            return $this->attribute($name);
        }
    }

    public function __set($key, $value){
        if(method_exists($this, $key)){
            $this->$key($value);
        }else{
            $this->$key = $value;
        }
    }



    /**
     * Renvoie un tableau qui contient les attributs du champ
     *
     * @return array
     */
    private function attributes()
    {
        return $this->options;
    }

    /**
     * Renvoie un attribut par son nom
     * @param string $attribute
     *
     * @return string
     */
    public function attribute(string $attribute)
    {
        return isset($this->attributes()[$attribute]) ? $this->attributes()[$attribute] : null;
    }

    /**
     * Ajoute le nom du champ
     * @param string $name
     *
     * @return Field
     */
    private function name(string $name)
    {
        $this->name = strtolower($name);
        return $this;
    }

    public function classes(array $classes){
        if(!empty($this->classes)){
            $this->classes = array_merge($classes, $this->classes);
        }else{
            $this->classes = $classes;
        }
        return $this;
    }

    /**
     * Ajoute le type de champ
     * @param string $type
     *
     * @return Field
     */
    private function type(string $type){
        $this->type = strtolower($type);
        return $this;
    }

    /**
     * Ajoute un placeholder au champ
     * @param string $placeholder
     *
     * @return Field
     */
    public function placeholder(string $placeholder)
    {
        $this->options['placeholder'] = $placeholder;
        return $this;
    }

    /**
     * Ajoute une longueur de caractères maximum au champ
     * @param int $length
     *
     * @return Field
     */
    public function maxLength(int $length)
    {
        $this->options['maxlength'] = $length;
        return $this;
    }

    /**
     * Ajoute un help d'aide au champ
     * @param string $help
     *
     * @return Field
     */
    public function help(string $help){
        $this->options['help'] = $help;
        return $this;
    }

    /**
     * Ajoute une valeur par défaut au champ
     * @param string|null $value
     *
     * @return Field
     */
    public function value($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Active / Désactive l'attribut autocomplete du champ
     * @param bool $autocomplete
     *
     * @return Field
     */
    public function autocomplete(bool $autocomplete = true){

        $this->options['autocomplete'] = $autocomplete;
        return $this;
    }

    /**
     * Ajoute une icon sur la partie gauche du champ
     * @param string $icon
     *
     * @return Field
     */
    public function icon(string $icon){
        $this->options['icon'] = $icon;
        return $this;
    }

    public function option($key, $value){
        $this->option[$key] = $value;
        return $this;
    }
}
