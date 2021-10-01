<?php
namespace App\controllers;

use App\dao\ProjectDao;
use App\models\Project;


class ProjectController{


    
    function create() : Project{
    $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    

    if($method === "GET"){
     

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "ProjectAdd.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);


//  si method = get affiche le formulaire de creation
    }

    if($method === "POST"){

// Recuperation des données dans le POST et instanciation d'un objet Project avec ces données.
      $project = new Project;
      $project->setTitle("$_POST[title]");
      $project->setDescription("$_POST[description]");
      $project->setBeginningDate("$_POST[beginning]");
      $project->setEndingDate("$_POST[ending]");
      $project->setPicture("$_POST[picture]");
      $project->setIdCv(1);

      $projectDao = (new ProjectDao)->create($project);
      $project->setId($projectDao);
     
      //  Afficher l'objet et je lrenvoi a une nouvelle view 
    }








    dump($method);
    $project = new Project;
    return $project;
    }

    function update() : void {

    }

    function delete() : void {

    }

    function getAll() : array{
      return $test = [];

    }

    function getById() : array{
        return $test = [];

    }


}

?>