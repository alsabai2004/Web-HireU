<?php
namespace WebHireU\Models;

use WebHireU\Core\Database;
use WebHireU\Core\Security;

final class User
{
    public static function create(string $name, string $email, string $password): int
    {
        $db = Database::connect();
        $stmt = $db->prepare(
            'INSERT INTO users (name,email,password) VALUES (?,?,?)'
        );
        $stmt->execute([$name, $email, Security::hash($password)]);
        return (int) $db->lastInsertId();
    }

    public static function findByEmail(string $email): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT * FROM users WHERE email = ? LIMIT 1'
        );
        $stmt->execute([$email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }
}
