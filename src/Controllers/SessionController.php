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

        $errorList = ErrorController::loginError($email, $password);

        if (empty($errorList)) {

            $currentUser = (new UserDao())->findByEmail($email);

            if (empty($currentUser)) {

                $errorList[] = 'Aucun compte existe avec l\'email : ' . $email;

            } else {

                if (password_verify($password, $currentUser->getPassword())) {

                    $_SESSION['currentUser'] = $currentUser;
                    $_SESSION['successMessage'] = "Connexion réussi";

                    $this->renderer->render(
                        ["layout.html.php"],
                        ["home", "index.html.php"]
                    );

                    exit;
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
     * Affiche la page pour que l'utilisateur puisse s'inscrire
     */
    public function register()
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

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

            $registerUser_input = filter_input_array(INPUT_POST, $arguments);

            $errorList = ErrorController::registerError($registerUser_input);

            if (empty($errorList)) {

                $passwordHash = password_hash($registerUser_input['password'], PASSWORD_DEFAULT);

                $NewUser = (new UserModel())
                    ->setUsername($registerUser_input['username'])
                    ->setEmailAdress($registerUser_input['email'])
                    ->setPassword($passwordHash)
                    ->setLastname($registerUser_input['lastname'])
                    ->setFirstname($registerUser_input['firstname'])
                    ->setHomeAdress($registerUser_input['adress'])
                    ->setRole('["ROLE_USER"]');

                try {

                    $id = (new UserDao())->addUser($NewUser);

                    $_SESSION['currentUser'] = $NewUser;
                    $_SESSION['currentUser_id'] = $id;
                    $_SESSION['successMessage'] = "Compte créé avec succée";

                    header('Location: /');

                    exit;

                } catch (PDOException $exception) {

                    // echo $exception->getMessage();

                    $this->renderer->render(
                        ["layout.html.php"],
                        ["session", "register.html.php"],
                        ["title" => 'S\'inscrire']
                    );
                }

            } else {

                $this->renderer->render(
                    ["layout.html.php"],
                    ["session", "register.html.php"],
                    ["title" => 'S\'inscrire', "errors" => $errorList, "inputContent" => $registerUser_input]
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
        unset($_SESSION['successMessage']);
        header("Location: /login");
    }
}