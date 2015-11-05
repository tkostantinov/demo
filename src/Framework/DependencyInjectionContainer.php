<?php

namespace Framework;

class DependencyInjectionContainer
{
    /**
     * @var mixed
     */
    private $data = array();

    /**
     * @param string $id
     * @param mixed  $dependency
     */
    function __set($id, $dependency)
    {
        $this->data[$id] = $dependency;
    }

    /**
     *
     * @param string $id
     *
     * @return mixed
     */
    function __get($id)
    {
        return $this->data[$id]($this);
    }
}
