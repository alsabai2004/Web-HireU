<?php

namespace WebHireU\Models;

use WebHireU\Core\Database;

class Employer
{
    public static function create(
        int $userId,
        string $company,
        string $description
    ): int {
        $stmt = Database::connection()->prepare(
            'INSERT INTO employers
            (user_id, company, description, created_at)
            VALUES (:user_id, :company, :description, datetime("now"))'
        );

        $stmt->execute([
            'user_id' => $userId,
            'company' => $company,
            'description' => $description,
        ]);

        return (int) Database::connection()->lastInsertId();
    }

    public static function findByUser(int $userId): ?array
    {
        $stmt = Database::connection()->prepare(
            'SELECT * FROM employers WHERE user_id = :user_id LIMIT 1'
        );

        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetch() ?: null;
    }
}
