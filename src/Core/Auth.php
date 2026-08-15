<?php
namespace WebHireU\Core;

use WebHireU\Models\User;

final class Auth
{
    public static function start(): void
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
    }

    public static function login(array $user): void
    {
        self::start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
    }

    public static function logout(): void
    {
        self::start();
        $_SESSION = [];
        session_destroy();
    }

    public static function user(): ?array
    {
        self::start();
        if (empty($_SESSION['user_id'])) return null;

        $stmt = Database::connect()->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$_SESSION['user_id']]);

        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public static function check(): bool
    {
        return self::user() !== null;
    }
}
