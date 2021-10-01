<?php

namespace App\controllers;

class MainController extends AbstractController
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        $this->renderer->render(
            ["layout.html.php"],
            ["home", "index.html.php"],
        );
    }
}