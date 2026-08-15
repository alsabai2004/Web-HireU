<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Database;
use WebHireU\Core\Response;

final class EmployerController
{
    public function index(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $stmt = Database::connect()->prepare(
            'SELECT * FROM jobs WHERE user_id = ? ORDER BY id DESC'
        );
        $stmt->execute([Auth::user()['id']]);

        Response::view('employer/index', [
            'jobs' => $stmt->fetchAll(\PDO::FETCH_ASSOC)
        ]);
    }

    public function delete(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $stmt = Database::connect()->prepare(
            'DELETE FROM jobs WHERE id = ? AND user_id = ?'
        );
        $stmt->execute([
            (int)($_POST['id'] ?? 0),
            Auth::user()['id']
        ]);

        Response::redirect('/employer');
    }
}
