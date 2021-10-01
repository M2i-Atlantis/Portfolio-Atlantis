<?php

namespace App\controllers;

use App\dao\ExperienceDao;
use App\models\Experience;
use App\models\BaseEntity;
use PDOException;

class ExperienceController
{
    /**
     * Affichage de toutes les expériences
     */
    public function index(): void
    {
        // Récupération de toutes les expériences
        try {
            $experiences = (new ExperienceDao())->getAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        // Démarrage de la mise en tampon
        ob_start();
        $title = 'Page d\'Accueil';
        // Appel de la vue
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "experience", "index.html.php"]);
        // Récupération & enregistrement des données dans une variable 
        // Puis suppression de la mémoire tampon
        $content = ob_get_clean(); 

        // Appel du layout
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }


}


?>