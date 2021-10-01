<?php

namespace App\dao;

use App\models\UserModel;

class UserDao extends AbstractDao
{
    /**
     * Recherche dans la base de donnée l'utilisateur qui correspond à l'email
     */
    public function findByEmail(string $email): UserModel|false
    {
        $sql = 'SELECT * FROM user WHERE email_adress LIKE :email';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":email" => $email
        ]);

        return $request->fetchObject(UserModel::class);
    }

    /**
     * Ajoute un Utilisateur dans la base donnée
     */
    public function addUser(UserModel $user): int
    {
        $sql = 'INSERT INTO user (username, email_adress, password, lastname, firstname, home_adress, role)
        VALUE (:username, :email_adress, :password, :lastname, :firstname, :home_adress, :role)';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":username" => $user->getUsername(),
            ":email_adress" => $user->getEmailAdress(),
            ":password" => $user->getPassword(),
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":home_adress" => $user->getHomeAdress(),
            ":role" => $user->getRole()
        ]);

        return $this->pdo->lastInsertId();
    }
}