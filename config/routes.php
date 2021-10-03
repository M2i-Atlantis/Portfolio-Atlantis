<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/project/create", ['GET','POST'], 'App\controllers\ProjectController', 'create', 'projectCreate');

$router->add("/project/(\d+)/show", ['GET'], 'App\controllers\ProjectController', 'showOne', 'projectShowOne');

// $router->add("/project/update",['GET'], 'App\controllers\ProjectController', 'update', 'projectUpdate');