<?php

require_once '../src/autoload.php';

$diContainer = new Framework\DependencyInjectionContainer();

$diContainer->router = function () {
    return new Framework\Router();
};

$diContainer->router->addRoute(
    'GET', '/', 'Demo\Controller\IndexController::indexAction'
);

try {
    $route = $diContainer->router->getMatchedRoute();

    $controller = $route->controller;
    $action = $route->action;
    $arguments = $route->arguments;

    call_user_func_array(array(new $controller($diContainer), $action), $arguments);

} catch (Exception $e) {
    echo $e->getMessage();
}
