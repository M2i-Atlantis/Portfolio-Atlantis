<?php

namespace App\Controllers;

class MainController
{
    /**
     * Affiche la page d'accueil
     */
    public function index()
    {
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }
}