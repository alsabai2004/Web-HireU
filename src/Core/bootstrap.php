<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__, 2));

require BASE_PATH . '/src/Core/Database.php';
require BASE_PATH . '/src/Core/Security.php';
require BASE_PATH . '/src/Core/DatabaseSetup.php';
require BASE_PATH . '/src/Core/Request.php';
require BASE_PATH . '/src/Core/Response.php';
require BASE_PATH . '/src/Core/Router.php';
require BASE_PATH . '/src/Models/User.php';
require BASE_PATH . '/src/Models/Category.php';
require BASE_PATH . '/src/Models/Application.php';
require BASE_PATH . '/src/Core/CategorySetup.php';

\WebHireU\Core\DatabaseSetup::run();
\WebHireU\Core\CategorySetup::run();
