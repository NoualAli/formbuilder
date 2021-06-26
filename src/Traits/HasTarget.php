<?php

namespace NLDev\FormBuilder\Traits;

use Exception;

trait HasTarget{
    /**
     * Input target
     *
     * @var string
     */
    public $target = '';

    /**
     * Input action
     *
     * @var string
     */
    public $action = '';

    /**
     * Set target
     *
     * @param string $target
     *
     * @return Field
     */
    public function target(string $target){
        $this->target = $target;
        return $this;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Field
     */
    public function action(string $action){
        if(filter_var($action, FILTER_VALIDATE_URL)){
            $this->action = $action;
        }else{
            throw new Exception("L'action n'est pas une url valide : $action");
        }
        return $this;
    }
}
