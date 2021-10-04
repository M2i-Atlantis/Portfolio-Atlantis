<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/project/create", ['GET','POST'], 'App\controllers\ProjectController', 'create', 'projectCreate');

$router->add("/project/(\d+)/show", ['GET'], 'App\controllers\ProjectController', 'getById', 'projectShowOne');

$router->add("/project/index", ['GET'], 'App\controllers\ProjectController', 'getAll', 'projectShowAll');

// $router->add("/project/update",['GET'], 'App\controllers\ProjectController', 'update', 'projectUpdate');