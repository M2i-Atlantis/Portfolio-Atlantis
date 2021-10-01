<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();

$router->add("/project/create", ['GET','POST'], 'App\controllers\ProjectController', 'create', 'projectCreate');