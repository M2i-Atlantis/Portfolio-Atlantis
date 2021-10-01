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
}