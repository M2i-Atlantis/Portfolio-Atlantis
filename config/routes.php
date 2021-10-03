<?php

/*****************
 *    SESSION    *
 *****************/

$router->add(
    "/(login)",
    ["GET"],
    "SessionController",
    "login",
    "login"
);

$router->add(
    "/(login)",
    ["POST"],
    "SessionController",
    "authenticate",
    "user_authenticate"
);

$router->add(
    "/(logout)",
    ["GET"],
    "SessionController",
    "logout",
    "logout"
);

/**************
 *    USER    *
 **************/

$router->add(
    "/(register)",
    ["GET", "POST"],
    "UserController",
    "createUser",
    "user_register"
);

$router->add(
    "/(user)/(edit)",
    ["GET", "POST"],
    "UserController",
    "editUser",
    "user_edit"
);

/**************
 *    CV    *
 **************/

$router->add(
    "/?",
    ["GET"],
    "CvController",
    "showAllCv",
    "home"
);