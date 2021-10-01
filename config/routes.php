<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

/**************
 *    USER    *
 **************/
$router->add(
    "/(login)?",
    ["GET"],
    "App\Controllers\SessionController",
    "login",
    "login"
);

$router->add(
    "/(login)?",
    ["POST"],
    "App\Controllers\SessionController",
    "authenticate",
    "authenticate"
);