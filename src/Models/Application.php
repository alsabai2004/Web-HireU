<?php

namespace WebHireU\Models;

use WebHireU\Core\Database;

class Application
{
    public static function create(int $userId, int $jobId): void
    {
        $stmt = Database::connection()->prepare(
            'INSERT OR IGNORE INTO applications
            (user_id, job_id, created_at)
            VALUES (:user_id, :job_id, datetime("now"))'
        );

        $stmt->execute([
            'user_id' => $userId,
            'job_id' => $jobId,
        ]);
    }

    public static function forUser(int $userId): array
    {
        $stmt = Database::connection()->prepare(
            'SELECT applications.*, jobs.title, jobs.company
             FROM applications
             JOIN jobs ON jobs.id = applications.job_id
             WHERE applications.user_id = :user_id
             ORDER BY applications.id DESC'
        );

        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetchAll();
    }
}
