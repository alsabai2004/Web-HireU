<?php

namespace WebHireU\Middleware;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;
use WebHireU\Core\EmployerSetup;
use WebHireU\Models\Employer;

class EmployerMiddleware
{
    public static function handle(): void
    {
        if (!Auth::check()) {
            Response::redirect('/login');
        }

        EmployerSetup::run();

        if (!Employer::findByUser((int) Auth::user()['id'])) {
            Response::redirect('/employer');
        }
    }
}
