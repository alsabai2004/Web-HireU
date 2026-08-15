<?php
namespace WebHireU\Core;

final class Security
{
    public static function csrf(): string
    {
        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['_csrf'];
    }

    public static function verify(string $token): bool
    {
        return isset($_SESSION['_csrf']) &&
            hash_equals($_SESSION['_csrf'], $token);
    }

    public static function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
    }
}
