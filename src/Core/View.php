<?php

namespace WebHireU\Core;

class View
{
    public static function render(string $view, array $data = []): void
    {
        $file = dirname(__DIR__, 2) . '/templates/' . $view . '.php';

        if (!is_file($file)) {
            http_response_code(500);
            exit('View not found: ' . $view);
        }

        extract($data, EXTR_SKIP);
        require $file;
    }
}
