<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")

$router->add("/(experience)?", ['GET'], 'App\controllers\ExperienceController', 'index', 'Experiences');
$router->add("/experience/create", ['GET', 'POST'], 'App\controllers\ExperienceController', 'create', 'createExperience');
$router->add("/experience/(\d+)/show", ['GET'], 'App\controllers\ExperienceController', 'show', 'showExperience');
$router->add("/experience/(\d+)/edit", ['GET', 'POST'], 'App\controllers\ExperienceController', 'edit', 'editExperience');
$router->add("/experience/(\d+)/delete", ['GET'], 'App\controllers\ExperienceController', 'delete', 'deleteExperience');