<?php


/**
 * Ici se trouvera toutes les routes vers les controllers
 *
 * L'ajout de route demande plusieurs arguments, en voici sa signature :
 * add(string $regex, array $methods, string $controller, string $action, string $name)
 *
 * @var \core\Router\Router $router
 */

// Experience

// $router->add("/cv/(\d+)/experience/", ['GET'], 'ExperienceController', 'index', 'experience_index');

$router->add("/cv/(\d+)/experience/create", ['GET', 'POST'], 'ExperienceController', 'create', 'experience_create');
// $router->add("/experience/create", ['GET', 'POST'], 'ExperienceController', 'create', 'experience_create');

//$router->add("/cv/experience/(\d+)/show", ['GET'], 'App\controllers\ExperienceController', 'show', 'experience_show');
$router->add("/cv/experience/(\d+)/edit", ['GET', 'POST'], 'ExperienceController', 'edit', 'experience_edit');
$router->add("/cv/experience/(\d+)/delete", ['GET', 'POST'], 'ExperienceController', 'delete', 'experience_delete');

// Training

$router->add(
    "/(training)",
    ["GET"],
    "App\controllers\TrainingController",
    "showAll",
    "training"
);

$router->add(
    "/(training)/new",
    ["GET", "POST"],
    "App\controllers\TrainingController",
    "new",
    "training_create"
);
$router->add(
    "/(training)/(\d+)/show",
    ["GET"],
    "App\controllers\TrainingController",
    "showById",
    "training_show"
);
$router->add(
    "/(training)/(\d+)/edit",
    ["GET", "POST"],
    "App\controllers\TrainingController",
    "edit",
    "training_update"
);
$router->add(
    "/(training)/(\d+)/delete",
    ["GET"],
    "App\controllers\TrainingController",
    "delete",
    "training_delete"
);

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

$router->add(
    "/cv/(\d+)",
    ["GET"],
    "CvController",
    "showCvById",
    "cv"
);
