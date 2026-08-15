<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;

final class DashboardController
{
    public function index(): void
    {
        if (!Auth::check()) Response::redirect('/login');

        Response::view('dashboard/index', [
            'user' => Auth::user()
        ]);
    }
}
