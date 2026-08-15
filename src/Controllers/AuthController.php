<?php

namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\DatabaseSetup;
use WebHireU\Core\View;
use WebHireU\Models\User;

class AuthController
{
    public function register(): void
    {
        DatabaseSetup::run();
        View::render('auth/register');
    }

    public function store(): void
    {
        DatabaseSetup::run();

        $name = trim($_POST['name'] ?? '');
        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
            View::render('auth/register', [
                'error' => 'Please enter valid information. Password must be at least 6 characters.'
            ]);
            return;
        }

        if (User::findByEmail($email)) {
            View::render('auth/register', [
                'error' => 'Email is already registered.'
            ]);
            return;
        }

        User::create($name, $email, $password);

        header('Location: /login');
        exit;
    }

    public function login(): void
    {
        DatabaseSetup::run();
        View::render('auth/login');
    }

    public function authenticate(): void
    {
        DatabaseSetup::run();

        $email = strtolower(trim($_POST['email'] ?? ''));
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            View::render('auth/login', [
                'error' => 'Invalid email or password.'
            ]);
            return;
        }

        unset($user['password']);
        Auth::login($user);

        header('Location: /');
        exit;
    }

    public function logout(): void
    {
        Auth::logout();
        header('Location: /login');
        exit;
    }
}
