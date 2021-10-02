<?php

namespace App\controllers;

use App\dao\UserDao;

class SessionController extends AbstractController
{
    /**
     * Affiche la page de connexion
     */
    public function login()
    {
        $this->renderer->render(
            ["layout.html.php"],
            ["session", "index.html.php"],
            ["title" => 'Connexion']
        );
    }

    /**
     * Permet de gérer la requete POST du la page connexion
     */
    public function authenticate()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $errorList = ErrorController::loginError($email, $password);

        if (empty($errorList)) {

            $currentUser = (new UserDao())->findByEmail($email);

            if (empty($currentUser)) {

                $errorList[] = 'Aucun compte existe avec l\'email : ' . $email;

            } else {

                if (password_verify($password, $currentUser->getPassword())) {

                    $_SESSION['currentUser'] = $currentUser;

                    $this->renderer->render(
                        ["layout.html.php"],
                        ["cv", "index.html.php"]
                    );

                    exit;

                } else {

                    $errorList[] = "Adresse email ou mot de passe incorrect";
                }
            }
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["session", "index.html.php"],
            ["errors" => $errorList]
        );
    }

    /**
     * Supprime la variable global $_SESSION['currentUser']
     * Quand l'utilisateur à cliquer sur le lien de Déconnexion
     */
    public function logout()
    {
        unset($_SESSION['currentUser']);
        header("Location: /login");
    }
}