<?php

namespace App\Core;

class Validator
{
    public static function string($value, $min = 0, $max = INF)
    {
        $value = trim($value);

        return strlen($value) === 0 ? false
            : (strlen($value) >= $min && strlen($value) <= $max);
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }
}
