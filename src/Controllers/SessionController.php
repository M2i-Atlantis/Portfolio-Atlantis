<?php

namespace App\controllers;

use App\dao\UserDao;
use App\Models\UserModel;
use PDOException;

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

            if (password_verify($password, $currentUser->getPassword())) {

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

            $register_user = filter_input_array(INPUT_POST, $arguments);

            if (
                isset($register_user["username"]) &&
                isset($register_user["email"]) &&
                isset($register_user["password"]) &&
                isset($register_user["lastname"]) &&
                isset($register_user["firstname"]) &&
                isset($register_user["adress"])
            ) {
                if (
                    empty($register_user["username"]) ||
                    empty($register_user["email"]) ||
                    empty($register_user["password"]) ||
                    empty($register_user["lastname"]) ||
                    empty($register_user["firstname"]) ||
                    empty($register_user["adress"])
                ) {

                    $errorMessage = 'Veuillez remplir tout les champs !';
                }
            }

            $passwordHash = password_hash($register_user['password'], PASSWORD_DEFAULT);

            $user = (new UserModel())
            ->setUsername($register_user['username'])
            ->setEmailAdress($register_user['email'])
            ->setPassword($passwordHash)
            ->setLastname($register_user['lastname'])
            ->setFirstname($register_user['firstname'])
            ->setHomeAdress($register_user['adress'])
            ->setRole('["ROLE_USER"]');

            if (empty($errorMessage)) {

                try {

                    // Récupérer l'utilisateur inscrie et l'ajouter a la variable globale $_SESSION

                    header('Location: /');

                    exit;

                } catch (PDOException $exception) {

                    echo $exception->getMessage();
                }

            } else {

                $this->renderer->render(
                    ["layout.html.php"],
                    ["session", "register.html.php"],
                    ["title" => 'S\'inscrire', "error" => $errorMessage]
                );
            }
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