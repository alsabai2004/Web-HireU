<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Database;
use WebHireU\Core\Response;
use WebHireU\Core\Security;

final class ApplicationController
{
    public function apply(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $jobId = (int)($_POST['job_id'] ?? 0);

        if (!Security::verify($_POST['_csrf'] ?? '')) {
            Response::text('Invalid security token', 403);
            return;
        }

        $stmt = Database::connect()->prepare(
            'INSERT OR IGNORE INTO applications (job_id,user_id,status)
             VALUES (?,?,"pending")'
        );
        $stmt->execute([$jobId, Auth::user()['id']]);

        Response::redirect('/job?id=' . $jobId);
    }

    public function index(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $stmt = Database::connect()->prepare(
            'SELECT applications.*, jobs.title, jobs.company
             FROM applications
             JOIN jobs ON jobs.id = applications.job_id
             WHERE applications.user_id = ?
             ORDER BY applications.id DESC'
        );
        $stmt->execute([Auth::user()['id']]);

        Response::view('dashboard/applications', [
            'applications' => $stmt->fetchAll(\PDO::FETCH_ASSOC)
        ]);
    }

    public function applicants(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $stmt = Database::connect()->prepare(
            'SELECT applications.*, jobs.title, users.name, users.email
             FROM applications
             JOIN jobs ON jobs.id = applications.job_id
             JOIN users ON users.id = applications.user_id
             WHERE jobs.user_id = ?
             ORDER BY applications.id DESC'
        );
        $stmt->execute([Auth::user()['id']]);

        Response::view('employer/applicants', [
            'applications' => $stmt->fetchAll(\PDO::FETCH_ASSOC)
        ]);
    }

    public function status(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $status = $_POST['status'] ?? 'pending';

        if (!in_array($status, ['pending','accepted','rejected'], true)) {
            Response::text('Invalid status', 400);
            return;
        }

        $stmt = Database::connect()->prepare(
            'UPDATE applications
             SET status = ?
             WHERE id = ?
             AND job_id IN (SELECT id FROM jobs WHERE user_id = ?)'
        );

        $stmt->execute([
            $status,
            (int)($_POST['id'] ?? 0),
            Auth::user()['id']
        ]);

        Response::redirect('/applicants');
    }
}
