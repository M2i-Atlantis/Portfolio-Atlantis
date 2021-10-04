<?php

namespace App\dao;

use core\Database;
use App\models\Project;
use PDO;




class ProjectDao {
    /**
     * Cree une nouvelle entrée dans la table Project de la BDD
     * @param $project "Les données à rentrer"
     * @return "l'id de l'entrée en question"
     */
    public function create($project): int {

        $dataBaseHandler = Database::getInstance()->getConnexion();
        $request = $dataBaseHandler->prepare('INSERT INTO project (title, description, starting_date, ending_date, picture_feature, id_cv ) 
                                            VALUES ( :title, :description, :starting_date, 
                                                                    :ending_date, :picture_feature, :id_cv)');
        $request->execute(
            [

                ":title"=>$project->getTitle(),
                ":description"=>$project->getDescription(),
                ":starting_date"=>$project->getBeginningDate(),
                ":ending_date"=>$project->getEndingDate(),
                ":picture_feature"=>$project->getPicture(),
                ":id_cv"=>$project->getIdCv()
            ]
            );
        return $dataBaseHandler->lastInsertId();
    }
/**
 * Fonction pour sélectionner un projet grace a son id
 * @param : int $id
 * @return : Null si le projet n'existe pas, sinon retourne un objet Projet
 */
    public function getByID(int $id) : ?Project {
        $dataBaseHandler = Database::getInstance()->getConnexion();
        $request = $dataBaseHandler->prepare('SELECT * FROM project WHERE id = :id');
        $request->execute(
            [
                ":id"=>$id
            ]
            );
        $result = $request->fetch();

        if(!empty($result)) {

            $object = new Project;
            $object->setTitle($result['title']);
            $object->setDescription($result['description']);
            $object->setBeginningDate($result['starting_date']);
            $object->setEndingDate($result['ending_date']);
            $object->setPicture($result['picture_feature']);
            $object->setIdCv($result['id_cv']);

            return $object;
        }
        else {
            return null;
        }      
    }

/**
 * Récupère tout les projets d'un utilisateur(cv) précis
 * @param int $id = L'id du cv
 * @return array un tableau de tout les projets du cv 
 */
    public function getAll(int $id) : array {

        $dataBaseHandler = Database::getInstance()->getConnexion();
        $request = $dataBaseHandler->prepare('SELECT * FROM project 
  
                                            WHERE id_cv = :idCv ');
        $request->execute([
            ":idCv"=>$id
        ]);

        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $projet){

            $proj = new Project;
            $proj->setId($projet['id']);
            $proj->setTitle($projet['title']);
            $proj->setDescription($projet['description']);
            $proj->setBeginningDate($projet['starting_date']);
            $proj->setEndingDate($projet['ending_date']);
            $proj->setPicture($projet['picture_feature']);
            $proj->setIdCv($projet['id_cv']);

            $result[$key] = $projet;



        }
        return $result;
    }

}

?>