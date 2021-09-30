<?php
// add(string "regex", array "methods", string "controller", string "action", string "name")
// $router->add();
/**
 * Ici se trouvera toutes les routes vers les controllers
 *
 * L'ajout de route demande plusieurs arguments, en voici sa signature :
 * add(string $regex, array $methods, string $controller, string $action, string $name)
 *
 * @var \core\Router\Router $router
 */
$router->add("/(training)", ["GET"], "App\controller\TrainingController", "index", "training");
$router->add("/(training)/new", ["GET", "POST"], "App\controller\TrainingController", "index", "create");
$router->add("/(training)/(\d+)/show", ["GET"], "App\controller\TrainingController", "show", "getById");
