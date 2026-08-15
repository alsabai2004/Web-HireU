<?php
namespace WebHireU\Models;
use WebHireU\Core\Database;

final class Category
{
    public static function all(): array
    {
        return Database::connect()->query(
            'SELECT * FROM categories ORDER BY name'
        )->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function create(string $name): int
    {
        $stmt = Database::connect()->prepare(
            'INSERT OR IGNORE INTO categories (name) VALUES (?)'
        );
        $stmt->execute([$name]);
        return (int) Database::connect()->lastInsertId();
    }
}
