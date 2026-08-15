<?php
declare(strict_types=1);

require dirname(__DIR__) . '/src/Core/bootstrap.php';
use WebHireU\Core\Security;


use WebHireU\Core\Router;
use WebHireU\Core\Request;
use WebHireU\Core\Response;
use WebHireU\Controllers\AuthController;
use WebHireU\Controllers\DashboardController;
use WebHireU\Controllers\JobController;
use WebHireU\Controllers\ApplicationController;
use WebHireU\Controllers\CategoryController;

$router = new Router();

$auth = new AuthController();
$jobs = new JobController();
$dashboard = new DashboardController();
$applications = new ApplicationController();
$categories = new CategoryController();

$router->get('/', fn() => Response::view('home'));
$router->get('/jobs', [$jobs, 'index']);
$router->get('/job', [$jobs, 'show']);
$router->get('/create-job', [$jobs, 'create']);
$router->post('/create-job', [$jobs, 'create']);

$router->get('/register', [$auth, 'register']);
$router->post('/register', [$auth, 'register']);
$router->get('/login', [$auth, 'login']);
$router->post('/login', [$auth, 'login']);
$router->get('/logout', [$auth, 'logout']);
$router->get('/dashboard', [$dashboard, 'index']);
$router->get('/employer', fn() => Response::view('employer/index'));
$router->post('/apply', function(){
    if (!Security::verify($_POST['_csrf'] ?? '')) Response::text('Invalid security token',403);
    else (new ApplicationController)->apply();
});
$router->get('/applications', [$applications, 'index']);
$router->get('/categories', [$categories, 'index']);

$router->dispatch(Request::method(), Request::path());
