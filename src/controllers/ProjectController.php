<?php
namespace App\controllers;

use App\dao\ProjectDao;
use App\models\Project;


class ProjectController{


    /**
     * Rentre les données du nouveau projet dans la BDD
     */
    public function create() : void{
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
  public function getById() : void {

    $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
   
    if($method === "GET"){
      

      $project = new ProjectDao;
      $object = $project->getById(1);

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "ProjectShowOne.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);


    }
  }

/**
 * Récupère tout les projets d'un utilisateur(cv) précis
 * @param int $id = L'id du cv
 * @return array un tableau de tout les projets du cv 
 */

  public function getAll(){

    $projets = new ProjectDao;
    $allProjects = $projets->getAll(1);
    if (!empty($projets)){

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "index.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);



    }


  }

/**
 * Permet de changer les données d'un projet dans la BDD
 * @param : idProjet
 * 
 */
  public function update($idProjet) : void {
    $method = filter_input(INPUT_SERVER, 'REQUEST_METHOD');
    $idProjet = 1;

    //  Si le client viens d'arriver sur la page, affiche le formulaire prérempli avec les données sur la BDD
    if($method === "GET"){

      $project = new ProjectDao;
      $projectDao = $project->getByID($idProjet);

  

     

      ob_start();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "ProjectView", "update.html.php"]);

      $contentTimeout = ob_get_clean();

      require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }

// Si le client a renvoyé le formulaire de la page, on enregistre les nouvelles données dnas la BDD
    if($method === "POST"){




    $project = new Project;
    $project->setId(1);
    $project->setTitle("$_POST[title]");
    $project->setDescription("$_POST[description]");
    $project->setBeginningDate("$_POST[beginning]");
    $project->setEndingDate("$_POST[ending]");

    $projectDao = (new ProjectDao)->update($project);




//  Puis on le redirige sur la page show by id
    } 
  }
  
/**
 * Permet la suppresion d'un projet dans la BDD
 * @param : int $id du projet a supprimer
 */

  public function delete(int $idProjet): void
  {
    $idProjet = 10;
    $projetToDelete = new ProjectDao;
    $projetToDelete->delete($idProjet);
  }
  




}

?>