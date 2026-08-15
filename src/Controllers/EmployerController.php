<?php

namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Csrf;
use WebHireU\Core\EmployerSetup;
use WebHireU\Core\Response;
use WebHireU\Core\Validator;
use WebHireU\Core\View;
use WebHireU\Models\Employer;
use WebHireU\Models\Job;

class EmployerController
{
    public function index(): void
    {
        $this->login();

        EmployerSetup::run();

        View::render('employer/index', [
            'user' => Auth::user(),
            'employer' => Employer::findByUser(
                (int) Auth::user()['id']
            ),
        ]);
    }

    public function store(): void
    {
        $this->login();
        Csrf::verify();
        EmployerSetup::run();

        Validator::required($_POST, [
            'company',
            'description'
        ]);

        $userId = (int) Auth::user()['id'];

        if (!Employer::findByUser($userId)) {
            Employer::create(
                $userId,
                trim($_POST['company']),
                trim($_POST['description'])
            );
        }

        Response::redirect('/employer');
    }

    public function createJob(): void
    {
        $this->login();
        EmployerSetup::run();

        if (!Employer::findByUser((int) Auth::user()['id'])) {
            Response::redirect('/employer');
        }

        View::render('employer/create-job', [
            'user' => Auth::user(),
        ]);
    }

    public function storeJob(): void
    {
        $this->login();
        Csrf::verify();
        EmployerSetup::run();

        $employer = Employer::findByUser(
            (int) Auth::user()['id']
        );

        if (!$employer) {
            Response::redirect('/employer');
        }

        Validator::required($_POST, [
            'title',
            'location',
            'description'
        ]);

        Job::create(
            trim($_POST['title']),
            $employer['company'],
            trim($_POST['location']),
            trim($_POST['description'])
        );

        Response::redirect('/jobs');
    }

    public function deleteJob(): void
    {
        $this->login();
        Csrf::verify();
        EmployerSetup::run();

        $jobId = (int) ($_POST['job_id'] ?? 0);
        $job = Job::find($jobId);

        if (!$job) {
            http_response_code(404);
            exit('Job not found.');
        }

        $employer = Employer::findByUser(
            (int) Auth::user()['id']
        );

        if (!$employer || $job['company'] !== $employer['company']) {
            http_response_code(403);
            exit('Unauthorized.');
        }

        Job::delete($jobId);

        Response::redirect('/jobs');
    }

    private function login(): void
    {
        if (!Auth::check()) {
            Response::redirect('/login');
        }
    }
}
