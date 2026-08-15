<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Auth;
use WebHireU\Core\Database;
use WebHireU\Core\Response;
use WebHireU\Core\Security;
use WebHireU\Core\Validator;

final class AuthController
{
    public function login(): void
    {
        if (Auth::check()) Response::redirect('/dashboard');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $stmt = Database::connect()->prepare(
                'SELECT * FROM users WHERE email = ? LIMIT 1'
            );
            $stmt->execute([$email]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                unset($user['password']);
                Auth::login($user);
                Response::redirect('/dashboard');
            }

            Response::view('auth/login', ['error' => 'Invalid email or password.']);
            return;
        }

        Response::view('auth/login');
    }

    public function register(): void
    {
        if (Auth::check()) Response::redirect('/dashboard');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = Validator::required($_POST, ['name','email','password']);

            if ($errors) {
                Response::view('auth/register', ['errors' => $errors]);
                return;
            }

            $db = Database::connect();
            $stmt = $db->prepare(
                'INSERT INTO users (name,email,password) VALUES (?,?,?)'
            );

            try {
                $stmt->execute([
                    trim($_POST['name']),
                    trim($_POST['email']),
                    password_hash($_POST['password'], PASSWORD_DEFAULT)
                ]);
                Response::redirect('/login');
            } catch (\PDOException $e) {
                Response::view('auth/register', [
                    'error' => 'Email already exists.'
                ]);
            }
            return;
        }

        Response::view('auth/register');
    }

    public function logout(): void
    {
        Auth::logout();
        Response::redirect('/');
    }
}
