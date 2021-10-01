<?php

namespace App\Controllers;

use App\Dao\UserDao;

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

    /**
     * Permet de gérer la requete POST du la page connexion
     */
    public function authenticate()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $currentUser = (new UserDao())->findByEmail($email);

        if (empty($currentUser)) {

            $errorMessage = 'Veuillez remplir les champs !';

        } else {

            if ($password === $currentUser->getPassword()) {

                $successMessage = 'Connexion réussi';

                $_SESSION['currentUser'] = $currentUser;

            } else {

                $errorMessage = 'Adresse email ou mot de passe invalide';
            }
        }

        ob_start();
        $title = 'Connexion';
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "session", "index.html.php"]);
        $contentTimeout = ob_get_clean();

        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
    }

    public function logout()
    {
        unset($_SESSION['currentUser']);
        header("Location: /login");
    }
}