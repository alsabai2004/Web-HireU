<?php

namespace WebHireU\Models;

use WebHireU\Core\Database;

class Job
{
    public static function all(): array
    {
        return Database::connection()
            ->query('SELECT * FROM jobs ORDER BY id DESC')
            ->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connection()->prepare(
            'SELECT * FROM jobs WHERE id = :id LIMIT 1'
        );

        $stmt->execute(['id' => $id]);

        return $stmt->fetch() ?: null;
    }

    public static function create(
        string $title,
        string $company,
        string $location,
        string $description
    ): int {
        $stmt = Database::connection()->prepare(
            'INSERT INTO jobs
            (title, company, location, description, created_at)
            VALUES (:title, :company, :location, :description, datetime("now"))'
        );

        $stmt->execute([
            'title' => $title,
            'company' => $company,
            'location' => $location,
            'description' => $description,
        ]);

        return (int) Database::connection()->lastInsertId();
    }

    public static function delete(int $id): void
    {
        $stmt = Database::connection()->prepare(
            'DELETE FROM jobs WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);
    }
}
