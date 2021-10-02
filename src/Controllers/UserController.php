<?php

namespace App\controllers;

use PDOException;
use App\dao\UserDao;
use App\Models\UserModel;

class UserController extends AbstractController
{
    /**
     * Méthode permettant d'ajouter un utilisateur
     */
    public function createUser()
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
     * Méthode permettant de modifier un utilisateur
     */
    public function editUser()
    {
        // TODO
    }
}