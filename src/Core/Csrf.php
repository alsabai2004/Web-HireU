<?php

namespace WebHireU\Core;

class Csrf
{
    public static function token(): string
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if (empty($_SESSION['_csrf'])) {
            $_SESSION['_csrf'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['_csrf'];
    }

    public static function field(): string
    {
        return '<input type="hidden" name="_csrf" value="' .
            htmlspecialchars(self::token(), ENT_QUOTES, 'UTF-8') .
            '">';
    }

    public static function verify(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        $token = $_POST['_csrf'] ?? '';

        if (
            !$token ||
            empty($_SESSION['_csrf']) ||
            !hash_equals($_SESSION['_csrf'], $token)
        ) {
            http_response_code(419);
            exit('Invalid security token.');
        }
    }
}
