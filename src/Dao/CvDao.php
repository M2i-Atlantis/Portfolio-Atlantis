<?php

namespace App\dao;

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
}