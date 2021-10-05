<?php

namespace App\Dao;

use PDO;
use App\models\CvModel;

class CvDao extends AbstractDao
{
    /**
     * Récupère tous les CV de la base de donnée
     */
    public function getAll(): array
    {
        $sql = 'SELECT cv.*, user.firstname, user.lastname
                FROM cv
                LEFT JOIN user ON user.id = id_user';

        $request = $this->pdo->prepare($sql);

        $request->execute();

        return $request->fetchAll(PDO::FETCH_CLASS, CvModel::class);
    }

    /**
     * Récupère un CV en fonction de son id
     */
    public function getById(int $id): CvModel|false
    {
        $sql = 'SELECT cv.*, user.firstname, user.lastname
                FROM cv
                LEFT JOIN user ON user.id = id_user
                WHERE cv.id = :id';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            ":id" => $id
        ]);

        return $request->fetchObject(CvModel::class);
    }

    /**
     * Permet de créer un nouveau CV
     */
    public function create(int $id): void
    {
        $sql = 'INSERT INTO cv (about_me, id_user)
                VALUE (:about_me, :id_user)';

        $request = $this->pdo->prepare($sql);

        $request->execute([
            "about_me" => '',
            ":id_user" => $id
        ]);
    }
}