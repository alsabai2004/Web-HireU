<?php
declare(strict_types=1);
declare(strict_types=1);
spl_autoload_register(function($class){$prefix="WebHireU\\";if(strpos($class,$prefix)!==0)return;$file=__DIR__."/../src/".str_replace("\\","/",substr($class,strlen($prefix))).".php";if(is_file($file))require_once $file;});

require dirname(__DIR__) . '/src/Core/bootstrap.php';
use WebHireU\Core\Security;


use WebHireU\Core\Router;
use WebHireU\Core\Request;
use WebHireU\Core\Response;
use WebHireU\Controllers\AuthController;
use WebHireU\Controllers\DashboardController;
use WebHireU\Controllers\JobController;
use WebHireU\Controllers\ApplicationController;
use WebHireU\Controllers\EmployerController;
use WebHireU\Controllers\CategoryController;
use WebHireU\Controllers\SearchController;

$router = new Router();

$auth = new AuthController();
$jobs = new JobController();
$dashboard = new DashboardController();
$applications = new ApplicationController();
$employer = new EmployerController();
$categories = new CategoryController();
$search = new SearchController();

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
$router->get('/employer', [$employer, 'index']);
$router->post('/employer/delete', [$employer, 'delete']);
$router->post('/apply', function(){
    if (!Security::verify($_POST['_csrf'] ?? '')) Response::text('Invalid security token',403);
    else (new ApplicationController)->apply();
});
$router->get('/applications', [$applications, 'index']);
$router->get('/applicants', [$applications, 'applicants']);
$router->post('/application/status', [$applications, 'status']);
$router->get('/categories', [$categories, 'index']);
$router->get('/search', [$search, 'index']);

$router->dispatch(Request::method(), Request::path());
