<?php

namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\JobSetup;
use WebHireU\Core\View;
use WebHireU\Models\Application;
use WebHireU\Models\Job;

class JobController
{
    public function index(): void
    {
        JobSetup::run();

        View::render('jobs/index', [
            'jobs' => Job::all(),
            'user' => Auth::user(),
        ]);
    }

    public function show(): void
    {
        JobSetup::run();

        $id = (int) ($_GET['id'] ?? 0);
        $job = Job::find($id);

        if (!$job) {
            http_response_code(404);
            exit('Job not found');
        }

        View::render('jobs/show', [
            'job' => $job,
            'user' => Auth::user(),
        ]);
    }

    public function apply(): void
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        JobSetup::run();

        Application::create(
            (int) Auth::user()['id'],
            (int) ($_POST['job_id'] ?? 0)
        );

        header('Location: /jobs');
        exit;
    }
}
