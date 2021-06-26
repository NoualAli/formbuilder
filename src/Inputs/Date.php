<?php

namespace NLDev\FormBuilder\Inputs;

use Exception;

class Date extends BulmaCalendar{

    /**
     * @var string
     */
    public $dateFormat = "yyyy-MM-dd";

    /**
     * @var bool
     */
    public $withTime = false;

    /**
     * @var null
     */
    public $endDate = null;

    /**
     * @var null
     */
    public $endTime = null;

    /**
     * @var string
     */
    public $format = 'Y-m-d';

    /**
     * Prédéfinit la date pour aujourd'hui
     *
     * @param string $format
     *
     * @return Date
     */
    public function today($format = 'Y-m-d'){
        if(date($format)){
            $this->value = date($format);
        }else{
            throw new Exception("Le format saisit n'est pas un format de date valide");
        }
        return $this;
    }

    /**
     * Active l'option de temps
     *
     * @param string|null $timeFormat
     *
     * @return Date
     */
    public function withTime(string $timeFormat = 'HH:mm')
    {
        $this->withTime = true;
        if (date($timeFormat)) {
            $this->timeFormat = $timeFormat;
        }else{
            throw new Exception("Le format d'heure saisit n'est pas un format d'heure valide");
        }
        return $this;
    }

    /**
     * Change le format pour les dates
     * Format par defaut : Y-m-d
     *
     * @param string $dateFormat
     *
     * @return Date
     */
    public function dateFormat(string $dateFormat)
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    public function endDate(string $date, string $time = null){
        $this->endDate = $date;
        if($time){
            $this->endTime = $time;
        }
        return $this;
    }

}
