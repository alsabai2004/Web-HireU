<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;
use WebHireU\Models\Job;
use WebHireU\Core\Validator;

final class JobController
{
    public function index(): void
    {
        Response::view('jobs/index', [
            'jobs' => Job::all(trim($_GET['q'] ?? ''))
        ]);
    }

    public function show(): void
    {
        $job = Job::find((int)($_GET['id'] ?? 0));
        if (!$job) {
            Response::text('Job not found', 404);
            return;
        }
        Response::view('jobs/show', ['job' => $job]);
    }

    public function create(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = Validator::required($_POST, ['title','description','company']);
            if ($errors) { Response::view('employer/create-job', ['errors'=>$errors]); return; }
            Job::create([
                'title' => trim($_POST['title'] ?? ''),
                'description' => trim($_POST['description'] ?? ''),
                'company' => trim($_POST['company'] ?? ''),
                'location' => trim($_POST['location'] ?? ''),
                'category_id' => $_POST['category_id'] ?? null,
                'user_id' => Auth::user()['id']
            ]);
            Response::redirect('/jobs');
        }

        Response::view('employer/create-job');
    }
}
