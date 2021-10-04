<?php

namespace App\controllers;

use App\dao\CvDao;
use PDOException;
use App\dao\UserDao;
use App\models\UserModel;

class UserController extends AbstractController
{
    /**
     * Méthode permettant d'ajouter un utilisateur
     */
    public function createUser(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ($request_method === 'GET') {

            $this->renderer->render(
                ["layout.html.php"],
                ["user", "register.html.php"],
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

                    $userDao = new UserDao();

                    $id = $userDao->addUser($NewUser);

                    $cvDao = new CvDao();

                    $cvDao->create($id);

                    $currentUser = $userDao->findById($id);

                    $_SESSION['currentUser'] = $currentUser;

                    header('Location: /');

                    exit;

                } catch (PDOException $exception) {

                    $errorList[] = $exception->getMessage();

                    $this->renderer->render(
                        ["layout.html.php"],
                        ["user", "register.html.php"],
                        ["title" => 'S\'inscrire',  "errors" => $errorList]
                    );
                }

            } else {

                $this->renderer->render(
                    ["layout.html.php"],
                    ["user", "register.html.php"],
                    ["title" => 'S\'inscrire', "errors" => $errorList, "inputContent" => $registerUser_input]
                );
            }
        }
    }

    /**
     * Méthode permettant de modifier un utilisateur dans la BDD
     */
    public function editUser(): void
    {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ($request_method === 'GET') {

            $this->renderer->render(
                ["layout.html.php"],
                ["user", "edit.html.php"],
                ["title" => 'Modifier mes informations', "inputContent" => $_SESSION['currentUser']]
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

            $editUser_input = filter_input_array(INPUT_POST, $arguments);

            $errorList = ErrorController::editError($editUser_input);

            if  (empty($editUser_input['password'])) {
                $editUser_input['password'] = $_SESSION['currentUser']->getPassword();
            }

            if (empty($errorList)) {

                $userDao = new UserDao();

                $user = $userDao->findById($_SESSION['currentUser']->getId());

                $user->setUsername($editUser_input['username'])
                    ->setEmailAdress($editUser_input['email'])
                    ->setPassword($editUser_input['password'])
                    ->setLastname($editUser_input['lastname'])
                    ->setFirstname($editUser_input['firstname'])
                    ->setHomeAdress($editUser_input['adress']);

                $userDao->edit($user);

                $_SESSION['currentUser'] = $user;

                header("Location: /");

            } else {

                $this->renderer->render(
                    ["layout.html.php"],
                    ["user", "edit.html.php"],
                    ["title" => 'Modifier mes informations', "errors" => $errorList, "inputContent" => $_SESSION['currentUser']]
                );
            }
        }
    }
}