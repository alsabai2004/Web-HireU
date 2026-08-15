<?php
namespace WebHireU\Core;

use PDO;

final class Database
{
    private static ?PDO $pdo = null;

    public static function connect(): PDO
    {
        if (self::$pdo) return self::$pdo;

        $dir = BASE_PATH . '/storage';
        if (!is_dir($dir)) mkdir($dir, 0755, true);

        self::$pdo = new PDO('sqlite:' . $dir . '/web_hireu.sqlite');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->exec('PRAGMA foreign_keys = ON');

        return self::$pdo;
    }
}
