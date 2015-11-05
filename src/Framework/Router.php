<?php

namespace Framework;

use Exception;

/**
 * Router routes all incomming requests to a specific Controller::action
 *
 * @author developer
 */
class Router
{
    private $routes = array();

    /**
     * Short description for Function
     *
     * @param string $method
     * @param string $url
     * @param string $action
     */
    public function addRoute($method, $url, $action)
    {
        $this->routes[] = array(
            'method' => $method,
            'url'    => $url,
            'action' => $action
        );
    }

    /**
     *
     *
     * @return Route
     * @throws Exception - throws Exception if no route is matched!
     */
    public function getMatchedRoute()
    {

        if (strlen($_SERVER['SCRIPT_NAME']) === strlen($_SERVER['REQUEST_URI'])) {
            $requestUri = '/';
        } else {
            $requestUri = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
        }

        $httpRequestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {

            //convert route's parameters
            $pattern = sprintf(
                "@^%s$@D",
                preg_replace('/\\\:[a-zA-Z0-9\_\-]+/', '([a-zA-Z0-9\-\_]+)', preg_quote($route['url']))
            );

            $matches = array();
            if ($httpRequestMethod == $route['method'] && preg_match($pattern, $requestUri, $matches)) {
                // remove the first match and just keep the extracted parameters
                array_shift($matches);

                // call specified controller's actions with the paramaters
                list($controller, $action) = explode("::", $route['action']);

                return $this->createRoute($controller, $action, $matches);
            }
        }

        throw new Exception("No route matched!");
    }

    /**
     * Short description for Function
     *
     * @param $controller
     * @param $action
     * @param $arguments
     *
     * @return Route
     */
    private function createRoute($controller, $action, $arguments)
    {
        return new Route($controller, $action, $arguments);
    }
}
