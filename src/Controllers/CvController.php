<?php

namespace App\controllers;

class CvController extends AbstractController
{
    /**
     * Méthode permettant d'afficher la liste des CV
     */
    public function showAllCv()
    {
        $this->renderer->render(
            ["layout.html.php"],
            ["cv", "showAll.html.php"],
        );
    }
}