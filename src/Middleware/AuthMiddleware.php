<?php

namespace WebHireU\Middleware;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;

class AuthMiddleware
{
    public static function handle(): void
    {
        if (!Auth::check()) {
            Response::redirect('/login');
        }
    }
}
