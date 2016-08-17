<?php

namespace App\Traits\Eloquent;

use Carbon\Carbon;

trait DateAMTrait 
{
    public function getDate($value)
    {
        return $this->asDateTime($value)->format('d/m/Y');
    }

    public function setDate($value)
    {
        if ( $value instanceof \DateTime ) {
            return $value;
        } else if ( is_string($value) ) {
            return Carbon::createFromFormat('d/m/Y', $value);
        }
        return Carbon::now()->format('d/m/Y');
    }
}