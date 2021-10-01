<?php

namespace App\controllers;

/**
 * Gérant les erreurs (404, 403, etc...)
 */
class ErrorController
{
    /**
     * Méthode gérant l'affichage de la page 404
     */
    public function err404(): void
    {
        // On envoie le header 404
        header('HTTP/1.0 404 Not Found');

        // Puis on gère l'affichage
        $this->renderer->render(
            ["layout.html.php"],
            ["error404", "index.html.php"],
        );
    }

    /**
     * Méthode gérant les érreurs du formulaire pour s'inscrire
     */
    public function registerError()
    {
        //TODO
    }
}