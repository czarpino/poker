<?php

require ".." . DIRECTORY_SEPARATOR . "app" . DIRECTORY_SEPARATOR . "bootstrap.php";

$router = new Router;
$router->execute($router->getRequestedRoute());

//echo nl2br(print_r($_SERVER, true));
