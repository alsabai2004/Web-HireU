<?php

namespace WebHireU\Models;

use WebHireU\Core\Database;

class Category
{
    public static function all(): array
    {
        return Database::connection()
            ->query('SELECT * FROM categories ORDER BY name')
            ->fetchAll();
    }

    public static function create(string $name): int
    {
        $stmt = Database::connection()->prepare(
            'INSERT INTO categories (name) VALUES (:name)'
        );

        $stmt->execute(['name' => $name]);

        return (int) Database::connection()->lastInsertId();
    }
}
