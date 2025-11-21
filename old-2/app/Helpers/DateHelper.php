<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function formatNotificationDate($dateString)
    {
        $date = Carbon::createFromFormat('d/m/Y', $dateString);
        $today = Carbon::today();
        $yesterday = Carbon::yesterday();
        $dayBeforeYesterday = Carbon::yesterday()->subDay();

        if ($date->isToday()) {
            return 'Hoy';
        } elseif ($date->isYesterday()) {
            return 'Ayer';
        } elseif ($date->isSameDay($dayBeforeYesterday)) {
            return $date->format('d/m/Y');
        } else {
            return $date->format('d/m/Y');
        }
    }
}
