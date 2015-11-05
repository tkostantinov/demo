<?php

namespace Framework;

class Route
{
    /**
     * @var string
     */
    public $controller;
    /**
     * @var string
     */
    public $action;
    /**
     * @var array
     */
    public $arguments;

    /**
     * @param string $controller
     * @param string $action
     * @param array  $arguments
     */
    public function __construct($controller, $action, $arguments)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->arguments = $arguments;
    }
}
