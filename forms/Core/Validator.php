<?php

namespace Core;

class Validator
{

    public static function string($value, $min, $max): bool
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value): string|bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
