<?php

namespace NLDev\FormBuilder\Inputs;

use DateTime;
use Exception;

abstract class BulmaCalendar extends Field
{


    /**
     * @var null
     */
    public $color = 'info';

    /**
     * @var null
     */
    public $display = 'dialog';


    /**
     * @var string
     */
    public $validateLabel = 'Valider';

    /**
     * @var string
     */
    public $todayLabel = "Aujourd'hui";

    /**
     * @var string
     */
    public $clearLabel = "Effacer";

    /**
     * @var string
     */
    public $cancelLabel = "Quitter";

    /**
     * @var string
     */
    public $lang = 'fr-FR';

    /**
     * @var bool
     */
    public $isRange = false;

    /**
     * @var string
     */
    public $labelFrom = 'Début';

    /**
     * @var string
     */
    public $labelTo = 'Fin';

    /**
     * @var string
     */
    public $timeFormat = 'HH:mm';

    /**
     * @var null
     */
    public $startTime = null;

    /**
     * @var null
     */
    public $endTime = null;


    // Seeters

    /**
     * Prédéfinit la date pour aujourd'hui
     *
     * @param string $format
     *
     * @return Date
     */
    public function now($format = 'H:m')
    {
        if (date($format)) {
            $this->startTime = date($format);
        } else {
            throw new Exception('Le format saisit n\'est pas valide');
        }
        return $this;
    }

    /**
     * Prédéfini l'heure de début
     *
     * @param string $time
     *
     * @return BulmaCalendar
     */
    public function startTime(string $time)
    {
        $this->startTime = $time;
        return $this;
    }

    /**
     * Prédéfini l'heure de fin
     *
     * @param string $time
     *
     * @return BulmaCalendar
     */
    public function endTime(string $time)
    {
        $this->endTime = $time;
        return $this;
    }

    /**
     * @param string $from
     *
     * @return Field
     */
    public function labelFrom(string $from)
    {
        $this->labelFrom = $from;
        return $this;
    }

    /**
     * @param string $to
     *
     * @return Field
     */
    public function labelTo(string $to)
    {
        $this->labelTo = $to;
        return $this;
    }

    /**
     * @return Field
     */
    public function isRange(?string $start = null, ?string $end = null)
    {
        $this->isRange = true;

        if ($start) {
            $start = date_parse($start);
            $this->startDate = (new DateTime($start['year'] . '-' . $start['month'] . '-' . $start['day']))->format($this->format);
            if ($this->type == 'datetime' || $this->tipe = 'time') {
                $this->startTime = $start['hour'] . ':' . $start['minute'];
            }
        }
        if ($end) {
            $end = date_parse($end);
            $this->endDate = (new DateTime($end['year'] . '-' . $end['month'] . '-' . $end['day']))->format($this->format);
            if ($this->type == 'datetime' || $this->tipe = 'time') {
                $this->endTime = $end['hour'] . ':' . $end['minute'];
            }
        }
        return $this;
    }

    /**
     * @param string $color
     *
     * @return Field
     */
    public function color(string $color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @param string $display
     *
     * @return Field
     */
    public function display(string $display)
    {
        $this->display = $display;
        return $this;
    }

    /**
     * @param string $label
     *
     * @return Field
     */
    public function todayLabel(string $label)
    {
        $this->todayLabel = $label;
        return $this;
    }

    /**
     * @param string $label
     *
     * @return Field
     */
    public function validateLabel(string $label)
    {
        $this->validateLabel = $label;
        return $this;
    }

    /**
     * @param string $label
     *
     * @return Field
     */
    public function clearLabel(string $label)
    {
        $this->clearLabel = $label;
        return $this;
    }

    /**
     * @param string $label
     *
     * @return Field
     */
    public function cancelLabel(string $label)
    {
        $this->cancelLabel = $label;
        return $this;
    }

    /**
     * @param string $lang
     *
     * @return Field
     */
    public function lang(string $lang)
    {
        $this->lang = $lang;
        return $this;
    }
}
