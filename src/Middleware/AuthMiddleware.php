<?php
namespace WebHireU\Middleware;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;

final class AuthMiddleware
{
    public static function handle(): void
    {
        if (!Auth::check()) Response::redirect('/login');
    }
}
