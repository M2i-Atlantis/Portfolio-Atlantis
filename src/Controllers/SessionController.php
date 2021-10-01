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

        $currentUser = (new UserDao())->findByEmail($email);

        $errorMessage = '';
        $successMessage = '';

        if (empty($currentUser)) {

            $errorMessage = 'Veuillez remplir tout les champs !';

        } else {

            if ($password === $currentUser->getPassword()) {

                $successMessage = 'Connexion réussi';

                $_SESSION['currentUser'] = $currentUser;

            } else {

                $errorMessage = 'Adresse email ou mot de passe invalide';
            }
        }

        $this->renderer->render(
            ["layout.html.php"],
            ["session", "index.html.php"],
            ["error" => $errorMessage, "success" => $successMessage]
        );
    }

    /**
     * Affiche la page pour que l'utilisateur puisse s'inscrire
     */
    public function register()
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        $errorMessage = '';
        $successMessage = '';

        if ($request_method === 'GET') {

            $this->renderer->render(
                ["layout.html.php"],
                ["session", "register.html.php"],
                ["title" => 'S\'inscrire'],
            );

        } elseif ($request_method === 'POST') {

            $arguments = [
                "username" => [FILTER_SANITIZE_STRING],
                "email" => [FILTER_VALIDATE_EMAIL],
                "password" => [FILTER_SANITIZE_STRING],
                "lastname" => [FILTER_SANITIZE_STRING],
                "firstname" => [FILTER_SANITIZE_STRING],
                "adress" => [FILTER_SANITIZE_STRING]
            ];

            $register = filter_input_array(INPUT_POST, $arguments);

            if (
                isset($register["username"]) &&
                isset($register["email"]) &&
                isset($register["password"]) &&
                isset($register["lastname"]) &&
                isset($register["firstname"]) &&
                isset($register["adress"])
            ) {
                $errorMessage = 'Veuillez remplir tout les champs !';
            }

            // TODO

            $this->renderer->render(
                ["layout.html.php"],
                ["session", "register.html.php"],
                ["title" => 'S\'inscrire', "error" => $errorMessage, "success" => $successMessage]
            );
        }
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