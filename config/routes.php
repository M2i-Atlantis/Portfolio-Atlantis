<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")

$router->add("/experience/(\d+)", ['GET'], 'App\controllers\ExperienceController', 'index', 'experience_index');
$router->add("/experience/create/(\d+)", ['GET', 'POST'], 'App\controllers\ExperienceController', 'create', 'experience_create');
$router->add("/experience/(\d+)/show", ['GET'], 'App\controllers\ExperienceController', 'show', 'experience_show');
$router->add("/experience/(\d+)/edit", ['GET', 'POST'], 'App\controllers\ExperienceController', 'edit', 'experience_edit');
$router->add("/experience/(\d+)/delete", ['GET', 'POST'], 'App\controllers\ExperienceController', 'delete', 'experience_delete');