<?php

namespace WebHireU\Core;

class Security
{
    public static function clean(string $value): string
    {
        return trim(strip_tags($value));
    }

    public static function escape(mixed $value): string
    {
        return htmlspecialchars(
            (string) $value,
            ENT_QUOTES,
            'UTF-8'
        );
    }
}
