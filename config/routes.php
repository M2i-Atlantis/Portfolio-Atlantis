<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

/**************
 *    HOME    *
 **************/
$router->add(
    "/?",
    ["GET"],
    "App\controllers\MainController",
    "index",
    "home"
);

/*****************
 *    SESSION    *
 *****************/
$router->add(
    "/(login)",
    ["GET"],
    "App\controllers\SessionController",
    "login",
    "login"
);

$router->add(
    "/(login)",
    ["POST"],
    "App\controllers\SessionController",
    "authenticate",
    "user_authenticate"
);

$router->add(
    "/(logout)",
    ["GET"],
    "App\controllers\SessionController",
    "logout",
    "logout"
);

/**************
 *    USER    *
 **************/
$router->add(
    "/(register)",
    ["GET", "POST"],
    "App\controllers\UserController",
    "createUser",
    "user_register"
);

$router->add(
    "/(user)/(edit)",
    ["GET", "POST"],
    "App\controllers\UserController",
    "editUser",
    "user_register"
);