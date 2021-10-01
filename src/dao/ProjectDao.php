<?php

namespace App\dao;

use core\Database;
use App\models\Project;




class ProjectDao {
    
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

}

?>