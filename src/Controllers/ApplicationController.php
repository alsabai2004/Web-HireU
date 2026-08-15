<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;
use WebHireU\Models\Application;

final class ApplicationController
{
    public function apply(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        $jobId = (int)($_POST['job_id'] ?? 0);
        Application::apply($jobId, (int)Auth::user()['id']);

        Response::redirect('/job?id=' . $jobId);
    }

    public function index(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        Response::view('dashboard/applications', [
            'applications' => Application::forUser((int)Auth::user()['id'])
        ]);
    }
}
