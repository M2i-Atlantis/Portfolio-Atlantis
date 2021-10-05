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
     * Méthode gérant les érreurs du formulaire pour se connecter
     */
    public static function loginError(string $email, string $password): ?array
    {
        $errorList = [];

        if (empty($email)) {
            $errorList[] = 'L\'adresse email ne doit pas être vide';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe ne doit pas être vide';
        }

        return $errorList;
    }

    /**
     * Méthode gérant les érreurs du formulaire pour s'inscrire
     */
    public function registerError(array $registerUser_input): ?array
    {
        $errorList = [];

        if (empty($registerUser_input['username'])) {
            $errorList[] = 'Veulliez saisir un nom d\'utilisateur';
        }
        if ($registerUser_input['email'] === false) {
            $errorList[] = 'L\'email est invalide';
        }
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $registerUser_input['password']) && !empty($registerUser_input['password'])) {
            $errorList[] = 'Le mot de passe doit contenir entre 8 et 15 caractères dont au moins une majuscule, une minuscule, un chiffre et des caractères non alphanumeriques';
        }
        if (empty($registerUser_input['password'])) {
            $errorList[] = 'Le mot de passe ne doit pas être vide';
        }
        if (empty($registerUser_input['lastname'])) {
            $errorList[] = 'Le nom ne doit pas être vide';
        }
        if (empty($registerUser_input['firstname'])) {
            $errorList[] = 'Le prénom ne doit pas être vide';
        }
        if (empty($registerUser_input['adress'])) {
            $errorList[] = 'L\adresse ne doit pas être vide';
        }

        return $errorList;
    }

    /**
     *
     */
    public function editError(array $editUser_input): ?array
    {
        $errorList = [];

        if (empty($editUser_input['username'])) {
            $errorList[] = 'Veulliez saisir un nom d\'utilisateur';
        }
        if ($editUser_input['email'] === false) {
            $errorList[] = 'L\'email est invalide';
        }
        if (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/', $editUser_input['password']) && !empty($editUser_input['password'])) {
            $errorList[] = 'Le mot de passe doit contenir entre 8 et 15 caractères dont au moins une majuscule, une minuscule, un chiffre et des caractères non alphanumeriques';
        }
        if (empty($editUser_input['lastname'])) {
            $errorList[] = 'Le nom ne doit pas être vide';
        }
        if (empty($editUser_input['firstname'])) {
            $errorList[] = 'Le prénom ne doit pas être vide';
        }
        if (empty($editUser_input['adress'])) {
            $errorList[] = 'L\adresse ne doit pas être vide';
        }

        return $errorList;
    }
}
