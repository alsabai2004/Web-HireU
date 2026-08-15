<?php

namespace WebHireU\Core;

class Validator
{
    public static function required(array $data, array $fields): void
    {
        foreach ($fields as $field) {
            if (!isset($data[$field]) || trim((string) $data[$field]) === '') {
                http_response_code(422);
                exit(ucfirst($field) . ' is required.');
            }
        }
    }

    public static function email(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            http_response_code(422);
            exit('Invalid email address.');
        }
    }

    public static function length(
        string $value,
        int $min = 1,
        int $max = 255
    ): void {
        $length = mb_strlen($value);

        if ($length < $min || $length > $max) {
            http_response_code(422);
            exit("Input length must be between {$min} and {$max} characters.");
        }
    }
}
