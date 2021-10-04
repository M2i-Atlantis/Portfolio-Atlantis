<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/project/create", ['GET','POST'], 'App\controllers\ProjectController', 'create', 'projectCreate');

$router->add("/project/(\d+)/show", ['GET'], 'App\controllers\ProjectController', 'getById', 'projectShowOne');

$router->add("/project/index", ['GET'], 'App\controllers\ProjectController', 'getAll', 'projectShowAll');

$router->add("/project/(\d+)/show/edit", ['GET','POST'], 'App\controllers\ProjectController', 'update', 'projectUpdate');

$router->add("/project/(\d+)/delete", ['GET'], 'App\controllers\ProjectController', 'delete', 'projectDelete');
