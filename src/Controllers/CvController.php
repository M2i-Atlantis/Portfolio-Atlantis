<?php

namespace App\controllers;

use App\dao\ContractDao;
use App\dao\CvDao;
Use App\dao\ExperienceDao;
use App\models\CvModel;
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
     * Méthode permettant d'afficher un CV selon son id
     */
    public function showCvById(int $id): void
    {
        try {

            $cv = (new CvDao())->getById($id);

            $experiences = (new ExperienceDao())->getByCvId($id);
            $contracts = (new ContractDao())->getAll();
            // Obtenir aussi les expériences du CV grâce à la dao associée

            if ($cv instanceof CvModel) {
                $this->renderer->render(
                    ["layout.html.php"],
                    ["cv", "show.html.php"],
                    // ["title" => "Tous les CV", "cv" => $cv] 
                    // Ajouter les données récupérées (tableau des expériences)
                    ["title" => "Tous les CV", "cv" => $cv, "experiences" => $experiences, "contracts" => $contracts]
                );
            } else {

                $this->redirectToRoute('home');
            }

        } catch (PDOException $exception) {

            echo $exception->getMessage();
        }
    }
}