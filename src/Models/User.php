<?php

namespace WebHireU\Models;

use WebHireU\Core\Database;
use PDO;

class User
{
    public static function findByEmail(string $email): ?array
    {
        $stmt = Database::connection()->prepare(
            'SELECT * FROM users WHERE email = :email LIMIT 1'
        );

        $stmt->execute(['email' => $email]);

        return $stmt->fetch() ?: null;
    }

    public static function create(
        string $name,
        string $email,
        string $password
    ): int {
        $stmt = Database::connection()->prepare(
            'INSERT INTO users (name, email, password, created_at)
             VALUES (:name, :email, :password, datetime("now"))'
        );

        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        return (int) Database::connection()->lastInsertId();
    }
}
