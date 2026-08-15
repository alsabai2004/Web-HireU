<?php
namespace WebHireU\Models;
use WebHireU\Core\Database;

final class Application
{
    public static function apply(int $jobId, int $userId): bool
    {
        try {
            $stmt = Database::connect()->prepare(
                'INSERT INTO applications (job_id,user_id) VALUES (?,?)'
            );
            return $stmt->execute([$jobId, $userId]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public static function forUser(int $userId): array
    {
        $stmt = Database::connect()->prepare(
            'SELECT applications.*, jobs.title, jobs.company
             FROM applications JOIN jobs ON jobs.id = applications.job_id
             WHERE applications.user_id = ?
             ORDER BY applications.id DESC'
        );
        $stmt->execute([$userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
