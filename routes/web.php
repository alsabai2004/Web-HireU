<?php

use WebHireU\Core\Router;
use WebHireU\Controllers\HomeController;
use WebHireU\Controllers\AuthController;
use WebHireU\Controllers\JobController;
use WebHireU\Controllers\DashboardController;
use WebHireU\Controllers\EmployerController;
use WebHireU\Controllers\SearchController;
use WebHireU\Controllers\CategoryController;

$router = new Router();

$home = new HomeController();
$auth = new AuthController();
$jobs = new JobController();
$dashboard = new DashboardController();
$employer = new EmployerController();
$search = new SearchController();
$categories = new CategoryController();

$router->get('/', [$home, 'index']);

$router->get('/register', [$auth, 'register']);
$router->post('/register', [$auth, 'store']);

$router->get('/login', [$auth, 'login']);
$router->post('/login', [$auth, 'authenticate']);
$router->get('/logout', [$auth, 'logout']);

$router->get('/jobs', [$jobs, 'index']);
$router->get('/job', [$jobs, 'show']);
$router->post('/jobs/apply', [$jobs, 'apply']);

$router->get('/dashboard', [$dashboard, 'index']);

$router->get('/employer', [$employer, 'index']);
$router->post('/employer', [$employer, 'store']);

$router->get('/employer/jobs/create', [$employer, 'createJob']);
$router->post('/employer/jobs', [$employer, 'storeJob']);
$router->post('/employer/jobs/delete', [$employer, 'deleteJob']);

$router->get('/search', [$search, 'index']);
$router->get('/categories', [$categories, 'index']);

return $router;
