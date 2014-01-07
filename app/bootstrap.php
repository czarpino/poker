<?php

/* <<<<<<< Bootstrap files */

require "Router.php";


/* >>>>>>> Bootstrap files */



/**
 * Register PSR-0 autoloader
 */
spl_autoload_register(function ($classPath)
{
    $namespace = "";
    $filename = "";
    $className = $classPath;

    $lastNamespacePos = strripos($classPath, '\\');

    if (FALSE !== $lastNamespacePos) {
        $namespace = substr($classPath, 0, $lastNamespacePos);
        $className = substr($classPath, $lastNamespacePos + 1);
        $filename = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $filename .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require "lib" . DIRECTORY_SEPARATOR . $filename;
});
