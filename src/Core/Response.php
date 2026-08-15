<?php
namespace WebHireU\Core;

final class Response
{
    public static function text(string $content, int $status = 200): void
    {
        http_response_code($status);
        echo $content;
    }

    public static function view(string $view, array $data = [], int $status = 200): void
    {
        http_response_code($status);
        extract($data, EXTR_SKIP);

        $file = BASE_PATH . '/templates/' . $view . '.php';

        if (!is_file($file)) {
            self::text('View not found', 404);
            return;
        }

        require $file;
    }

    public static function redirect(string $url): never
    {
        header('Location: ' . $url);
        exit;
    }
}
