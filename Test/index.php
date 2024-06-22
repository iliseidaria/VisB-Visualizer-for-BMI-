<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

$request_uri = $_SERVER['REQUEST_URI'];
$route = strtok($request_uri, '?');

$routes = [
    '/Test/' => 'HomeController@index',
    '/Test/statistics' => 'StatisticsController@index',
    '/Test/comparison' => 'ComparisonController@index',
    '/Test/visualization' => 'VisualizationController@index',
    '/Test/contact' => 'ContactController@index',
    '/Test/login' => 'LoginController@index',
    '/Test/admin' => 'AdminController@index',
];

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

