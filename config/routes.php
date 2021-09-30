<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

/**************
 *    USER    *
 **************/
$router->add(
    "/login?",
    ["GET"],
    "App\Controllers\UserController",
    "login",
    "login"
);