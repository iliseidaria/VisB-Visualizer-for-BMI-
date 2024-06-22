<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

$request_uri = $_SERVER['REQUEST_URI'];
$route = strtok($request_uri, '?');

$routes = [
    '/Test/' => 'HomeController@index',                 
    '/Test/View/statistics.php' => 'View/statistics.php',
    '/Test/View/comparison.php' => 'View/comparison.php',
    '/Test/View/visualization.php' => 'View/visualization.php',
    '/Test/View/contact.php' => 'View/contact.php',
    '/Test/View/login.php' => 'View/login.php',
];

// Verifică dacă ruta curentă există în lista de rute definite
if (array_key_exists($route, $routes)) {
    list($controllerName, $methodName) = explode('@', $routes[$route]);
    
    require_once BASE_PATH . '/Controller/' . $controllerName . '.php';
    
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    header('Location: /Test/');
    exit;
}
?>
