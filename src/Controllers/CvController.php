<?php

namespace App\controllers;

use App\dao\CvDao;
use PDOException;

class CvController extends AbstractController
{
    /**
     * Méthode permettant d'afficher la liste des CV
     */
    public function showAllCv()
    {
        try {

            $allCv = (new CvDao())->getAll();

        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["cv", "showAll.html.php"],
            ["title" => "Tous les CV", "allCv" => $allCv]
        );
    }
}