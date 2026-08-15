<?php
namespace WebHireU\Models;

use WebHireU\Core\Database;

final class Job
{
    public static function all(string $search = ''): array
    {
        $db = Database::connect();

        if ($search !== '') {
            $stmt = $db->prepare(
                'SELECT jobs.*, categories.name AS category
                 FROM jobs LEFT JOIN categories ON categories.id = jobs.category_id
                 WHERE jobs.title LIKE ? OR jobs.company LIKE ? OR jobs.location LIKE ?
                 ORDER BY jobs.id DESC'
            );
            $q = '%' . $search . '%';
            $stmt->execute([$q, $q, $q]);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        return $db->query(
            'SELECT jobs.*, categories.name AS category
             FROM jobs LEFT JOIN categories ON categories.id = jobs.category_id
             ORDER BY jobs.id DESC'
        )->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function find(int $id): ?array
    {
        $stmt = Database::connect()->prepare(
            'SELECT jobs.*, categories.name AS category
             FROM jobs LEFT JOIN categories ON categories.id = jobs.category_id
             WHERE jobs.id = ?'
        );
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(array $data): int
    {
        $stmt = Database::connect()->prepare(
            'INSERT INTO jobs (title,description,company,location,category_id,user_id)
             VALUES (?,?,?,?,?,?)'
        );
        $stmt->execute([
            $data['title'], $data['description'], $data['company'],
            $data['location'], $data['category_id'] ?: null, $data['user_id']
        ]);
        return (int) Database::connect()->lastInsertId();
    }
}
