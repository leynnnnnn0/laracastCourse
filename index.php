<?php
const BASE_PATH = __DIR__ . '\\';
session_start();
require_once BASE_PATH . '\Core\functions.php';


spl_autoload_register(function ($class) {
    require_once base_path('Core/' . $class . ".php");
    // $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);

});

require_once base_path('bootstrap.php');

// require_once base_path('Core\\Router.php');

$router = new Router();
$routes = require_once 'routes.php';


$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
