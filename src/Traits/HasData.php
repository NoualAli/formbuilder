<?php

namespace NLDev\FormBuilder\Traits;

trait HasData
{
    /**
     * Input data
     *
     * @var array
     */
    public $data = [];

    public function data(array $data, bool $hasKeys = false)
    {
        if (!$hasKeys) {
            $newData = [];
            foreach ($data as $item) {
                $newData[$item] = $item;
            }
            $data = $newData;
        }
        $this->data = $data;
        return $this;
    }
}
