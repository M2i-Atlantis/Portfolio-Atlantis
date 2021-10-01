<?php

namespace App\Controllers;

class SessionController
{
    /**
     * Affiche la page de connexion
     */
    public function login()
    {
        ob_start();
        $title = 'Connexion';
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "session", "index.html.php"]);
        $contentTimeout = ob_get_clean();

        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }
}