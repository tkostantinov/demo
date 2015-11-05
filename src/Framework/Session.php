<?php

namespace Framework;

/**
 * Session storage class, provides accessors for $_SESSION super global
 * variable data
 *
 */
class Session
{
    public function __construct()
    {
        session_start();
    }

    /**
     * sets an entry into the $_SESSION super global
     *
     * @param string $key
     * @param string $value
     */
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $_SESSION[$key];
    }
}
