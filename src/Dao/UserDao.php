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
        $sql = 'SELECT *
                FROM user
                WHERE email_adress
                LIKE :email';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":email" => $email
        ]);

        return $request->fetchObject(UserModel::class);
    }

    /**
     * Récupère un utilisateur avec l'id
     */
    public function findById(int $id): UserModel|false
    {
        $sql = 'SELECT *
                FROM user
                WHERE id
                LIKE :id';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":id" => $id
        ]);

        return $request->fetchObject(UserModel::class);
    }

    /**
     * Ajoute un Utilisateur dans la base donnée
     */
    public function addUser(UserModel $user): int
    {
        $sql = 'INSERT INTO user (username, email_adress, password, lastname, firstname, home_adress, role, last_connected)
                VALUE (:username, :email_adress, :password, :lastname, :firstname, :home_adress, :role, NOW())';

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

    /**
     * Modifie un utilisateur
     */
    public function edit(UserModel $user): void
    {
        $sql = 'UPDATE user
                SET username = :username, email_adress = :email, password = :password, lastname = :lastname, firstname = :firstname, home_adress = :adress
                WHERE id = :id';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":id" => $user->getId(),
            ":username" => $user->getUsername(),
            ":email" => $user->getEmailAdress(),
            ":password" => $user->getPassword(),
            ":lastname" => $user->getLastname(),
            ":firstname" => $user->getFirstname(),
            ":adress" => $user->getHomeAdress()
        ]);
    }

    /**
     * Méthode permettant de mettre à jours la dernière connexion de l'utilisateur selon l'id
     */
    public function updateLastConnected(int $id): void
    {
        $sql = 'UPDATE user
                SET last_connected = NOW()
                WHERE id = :id';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":id" => $id
        ]);
    }
}