<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

/**************
 *    HOME    *
 **************/
$router->add(
    "/?",
    ["GET"],
    "App\Controllers\MainController",
    "index",
    "home"
);

/*****************
 *    SESSION    *
 *****************/
$router->add(
    "/(login)",
    ["GET"],
    "App\Controllers\SessionController",
    "login",
    "login"
);

$router->add(
    "/(login)",
    ["POST"],
    "App\Controllers\SessionController",
    "authenticate",
    "authenticate"
);

$router->add(
    "/(register)",
    ["GET", "POST"],
    "App\Controllers\SessionController",
    "register",
    "register"
);

$router->add(
    "/(logout)",
    ["GET"],
    "App\Controllers\SessionController",
    "logout",
    "logout"
);

/**************
 *    USER    *
 **************/
