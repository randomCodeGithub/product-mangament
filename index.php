<?php
//DIRECTORIES
$page_directory = dirname($_SERVER["PHP_SELF"]);

//project root
define('BASE_ROOT', 'http://localhost' . $page_directory );

//view root
define('VIEW_ROOT', __DIR__ . '/views');

//home root
define('HOME_ROOT', $page_directory);

session_start();

require_once('./system/router.php');
require_once('./system/Database.php');
require_once('./models/product.php');
require_once('./models/producttype.php');

$router = new Router();
$router->run();