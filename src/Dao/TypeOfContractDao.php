<?php
namespace App\dao;

use core\Database;
use models\TypeOfContract;
use models\BaseEntity;
use PDO;

class TypeOfContractDao extends AbstractDao
{
    /**
     * Récupération de tous les types de contract
     *
     * @return TypeOfContract[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->prepare("SELECT * FROM type_of_contract");
        $req->execute();
        $contracts = $req->fetchAll(PDO::FETCH_ASSOC);

        return $contracts;
    }
}