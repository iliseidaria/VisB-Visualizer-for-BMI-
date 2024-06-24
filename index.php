<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

$request_uri = $_SERVER['REQUEST_URI'];
$route = strtok($request_uri, '?');

$routes = [
    '/VisB-Visualizer-for-BMI/' => 'HomeController@index',
    '/VisB-Visualizer-for-BMI/statistics' => 'StatisticsController@index',
    '/VisB-Visualizer-for-BMI/comparison' => 'ComparisonController@index',
    '/VisB-Visualizer-for-BMI/visualization' => 'VisualizationController@index',
    '/VisB-Visualizer-for-BMI/contact' => 'ContactController@index',
    '/VisB-Visualizer-for-BMI/login' => 'LoginController@index',
    '/VisB-Visualizer-for-BMI/admin' => 'AdminController@index',
    '/VisB-Visualizer-for-BMI/visualize_Data' => 'DataVisualizationController@index',
    '/VisB-Visualizer-for-BMI/modify_Data' => 'ModifyDataController@index',
    '/VisB-Visualizer-for-BMI/admin_home' => 'AdminHomeController@index',
    '/VisB-Visualizer-for-BMI/View/bar_chart.php' => 'bar_chart',
    '/VisB-Visualizer-for-BMI/View/geo_chart.php' => 'geo_chart',
    '/VisB-Visualizer-for-BMI/View/line_chart.php' => 'line_chart',
];

if (array_key_exists($route, $routes)) {
    list($controllerName, $methodName) = explode('@', $routes[$route]);

    require_once BASE_PATH . '/Controller/' . $controllerName . '.php';

    $controller = new $controllerName();
    $controller->$methodName();
} else {
    
    header('Location: /VisB-Visualizer-for-BMI/');
    exit;
}
?>

