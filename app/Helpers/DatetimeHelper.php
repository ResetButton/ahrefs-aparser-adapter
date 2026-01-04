<?php

namespace App\Helpers;

class DatetimeHelper
{
    public static function fakeDatetime(): string
    {
        return gmdate('Y-m-d\TH:i:s\Z');;
    }
}
