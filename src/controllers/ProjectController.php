<?php
namespace App\controllers;

use App\dao\ProjectDao;
use App\models\Project;


class ProjectController{


    /**
     * Rentre les données du nouveau projet dans la BDD
     */
    function create() : void{
    $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    
//  Si la page est ouverte sans envoi de données dans le POST, affiche le formulaire adapté grâce au GET
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
//  IdCV marqué en dur en attendant la syntaxe exacte de la variable
      $project->setIdCv(1);

      $projectDao = (new ProjectDao)->create($project);
      $project->setId($projectDao);

// Redirection vers la page du projet créé
      header(sprintf("Location: /project/{$project->getId()}/show", ));
                    exit;

    }
  }
/**
 * Cherche et Affiche la vue du projet
 * @param : int $id du projet a récupérer
 */
  function getById(int $id) : void {

    $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
   
    if($method === "GET"){
      

      $project = new ProjectDao;
      $object = $project->getById($id);

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "ProjectShowOne.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);


    }
  }


  function getAll(){

    $projets = new ProjectDao;
    $allProjects = $projets->getAll(1);
    if (!empty($projets)){

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "index.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);



    }


  }


  // function update(int $id) : void {
    




  // }

    // function update() : void {

    // }

    // function delete() : void {

    // }



}

?>