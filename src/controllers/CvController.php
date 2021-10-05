<?php

namespace App\controllers;

use App\dao\CvDao;
use App\models\CvModel;
use App\models\Training;
use PDOException;

class CvController extends AbstractController
{
    /**
     * Méthode permettant d'afficher la liste des CV
     */
    public function showAllCv(): void
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

    /**
     * Méthode permettant d'afficher un CV celon sont id
     */
    public function showCvById(int $id): void
    {
        try {

            $cv = (new CvDao())->getById($id);
            $trainings = Training::getAll($id);

            if ($cv instanceof CvModel) {

                $this->renderer->render(
                    ["layout.html.php"],
                    ["cv", "show.html.php"],
                    ["title" => "Mon CV", "cv" => $cv, "trainings" => $trainings]
                );

            } else {

                $this->redirectToRoute('home');
            }

        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }
    }
}
