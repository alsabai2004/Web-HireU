<?php

namespace WebHireU\Controllers;

use WebHireU\Core\View;

class HomeController
{
    public function index(): void
    {
        View::render('home', [
            'appName' => 'Web-HireU',
        ]);
    }
}
