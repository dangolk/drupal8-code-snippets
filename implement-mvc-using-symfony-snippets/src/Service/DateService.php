<?php

namespace App\Service;

class DateService
{
    public function yearsDifference($year)
    {
        $curYear = date('Y');
        $diff = $curYear - $year;
        return $diff;
    }
}
