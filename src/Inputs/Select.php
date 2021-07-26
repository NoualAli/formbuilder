<?php

namespace NLDev\FormBuilder\Inputs;

use NLDev\FormBuilder\Traits\HasData;

class Select extends Field
{
    use HasData;

    /**
     * Transfrom une selectbox à une selectbox avec des groupes
     *
     * @return Select
     */
    public function group(array $data, bool $hasKeys = false)
    {
        if (!$hasKeys) {
            $newData = [];
            foreach ($data as $title => $items) {
                foreach($items as $item){
                    $newData[$title][$item] = $item;
                }
            }
            $data = $newData;
        }
        $this->data = $data;
        $this->options['is_group'] = true;
        return $this;
    }
}
