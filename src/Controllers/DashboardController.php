<?php

namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\JobSetup;
use WebHireU\Core\View;
use WebHireU\Models\Application;

class DashboardController
{
    public function index(): void
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        JobSetup::run();

        View::render('dashboard/index', [
            'user' => Auth::user(),
            'applications' => Application::forUser(
                (int) Auth::user()['id']
            ),
        ]);
    }
}
