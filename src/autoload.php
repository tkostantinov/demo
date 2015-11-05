<?php

/**
 * PSR-4 autoloader
 *
 * @param string $class The fully-qualified class name.
 *
 * @return void
 */
spl_autoload_register(
    function ($class) {

        $base_dir = __DIR__;

        $file = $base_dir . '/' . str_replace('\\', '/', $class) . '.php';

        if (file_exists($file)) {
            require_once $file;
        }
    }
);