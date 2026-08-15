<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Response;
use WebHireU\Models\User;

final class AuthController
{
    public function register(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 6) {
                Response::view('auth/register', ['error' => 'Please enter valid information.']);
                return;
            }

            if (User::findByEmail($email)) {
                Response::view('auth/register', ['error' => 'Email already exists.']);
                return;
            }

            $id = User::create($name, $email, $password);
            Auth::login(['id' => $id]);
            Response::redirect('/dashboard');
        }

        Response::view('auth/register');
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = User::findByEmail(trim($_POST['email'] ?? ''));

            if ($user && \WebHireU\Core\Security::verify($_POST['password'] ?? '', $user['password'])) {
                Auth::login($user);
                Response::redirect('/dashboard');
            }

            Response::view('auth/login', ['error' => 'Invalid email or password.']);
            return;
        }

        Response::view('auth/login');
    }

    public function logout(): void
    {
        Auth::logout();
        Response::redirect('/');
    }
}
