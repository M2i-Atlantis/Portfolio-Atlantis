<?php
namespace App\Dao;

use core\Database;
use models\Contract;
use models\BaseEntity;
use PDO;

class ContractDao extends AbstractDao
{
    /**
     * Récupération de tous les types de contract
     *
     * @return Contract[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->prepare("SELECT * FROM type_of_contract");
        $req->execute();
        $contracts = $req->fetchAll(PDO::FETCH_ASSOC);

        return $contracts;
    }
}