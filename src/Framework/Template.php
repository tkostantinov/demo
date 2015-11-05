<?php

namespace Framework;

use Exception;

/**
 * Simple template engine
 *
 */
class Template
{
    protected $vars = array();

    /**
     * outputs the template file
     *
     * @param string $filepath
     *
     * @throws Exception
     */
    public function render($filepath)
    {
        if (file_exists($filepath)) {
            include $filepath;
        } else {
            throw new Exception(sprintf("Template file '%s' not found!", $filepath));
        }
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }

    /**
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->vars[$name];
    }
}
