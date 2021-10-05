<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/project/create", ['GET','POST'], 'App\controllers\ProjectController', 'create', 'projectCreate');

$router->add("/project/(\d+)/show", ['GET'], 'App\controllers\ProjectController', 'getById', 'projectShowOne');

$router->add("/project/index", ['GET'], 'App\controllers\ProjectController', 'getAll', 'projectShowAll');

$router->add("/project/(\d+)/show/edit", ['GET','POST'], 'App\controllers\ProjectController', 'update', 'projectUpdate');

$router->add("/project/(\d+)/delete", ['GET'], 'App\controllers\ProjectController', 'delete', 'projectDelete');

$router->add("/experience/(\d+)", ['GET'], 'App\controllers\ExperienceController', 'index', 'experience_index');
$router->add("/experience/create/(\d+)", ['GET', 'POST'], 'App\controllers\ExperienceController', 'create', 'experience_create');
$router->add("/experience/(\d+)/show", ['GET'], 'App\controllers\ExperienceController', 'show', 'experience_show');
$router->add("/experience/(\d+)/edit", ['GET', 'POST'], 'App\controllers\ExperienceController', 'edit', 'experience_edit');
$router->add("/experience/(\d+)/delete", ['GET', 'POST'], 'App\controllers\ExperienceController', 'delete', 'experience_delete');
// $router->add();
/**
 * Ici se trouvera toutes les routes vers les controllers
 *
 * L'ajout de route demande plusieurs arguments, en voici sa signature :
 * add(string $regex, array $methods, string $controller, string $action, string $name)
 *
 * @var \core\Router\Router $router
 */
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
