<?php
namespace App\Dao;

use App\interface\CrudInterface;
use App\models\BaseEntity;

use core\Database;
use App\models\Experience;
use PDO;

class ExperienceDao extends AbstractDao implements CrudInterface
{
    /**
     * Récupération de toutes les expériences 
     *
     * @return Experience[]
     */
    public function getAll(): array
    {
        $req = $this->pdo->prepare("SELECT * FROM experience");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        // Parser les données récupérer et les mettre dans un tableau d'expériences

        foreach ($result as $key => $experience) {
            $exp = new Experience();
            $exp->setId($experience['id']);
            $exp->setStartDate($experience['starting_date']);
            $exp->setEndDate($experience['ending_date']);
            $exp->setLocation($experience['location']);
            $exp->setDescription($experience['description']);
            $exp->setName($experience['name']);
            $exp->setContractType($experience['type_of_contract']);
            $exp->setCvId($experience['id_cv']);

            $result[$key] = $exp;
        }
        return $result;
    }

    /**
     * Récupération de toutes les expériences par l'ID du CV.
     *
     * @return Experience[]
     */
    public function getByCvId(int $idCv): array
    {
        $req = $this->pdo->prepare("SELECT * FROM experience WHERE id_cv = :idCv");
        $req->execute([":idCv" => $idCv]);
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        // Parser les données récupérer et les mettre dans un tableau d'expériences

        foreach ($result as $key => $experience) {
            $exp = new Experience();
            $exp->setId($experience['id']);
            $exp->setStartDate($experience['starting_date']);
            $exp->setEndDate($experience['ending_date']);
            $exp->setLocation($experience['location']);
            $exp->setDescription($experience['description']);
            $exp->setName($experience['name']);
            $exp->setContractType($experience['type_of_contract']);
            $exp->setCvId($experience['id_cv']);

            $result[$key] = $exp;
        }
        return $result;
    }

    /**
     * Insertion d'une nouvelle expérience
     *
     * @param Experience $experience experience à insérer
     * @return int Identifiant de l'experience nouvellement créée
     */
    public function create($experience): int
    {
        $req = $this->pdo->prepare(
            "INSERT INTO experience (starting_date, ending_date, location, description, name, type_of_contract, id_cv)
            VALUES (:starting_date, :ending_date, :location, :description, :name, :type_of_contract, :id_cv)"
        );
        $req->execute([
            ":starting_date" => $experience->getStartDate(),
            ":ending_date" => $experience->getEndDate(),
            ":location" => $experience->getLocation(),
            ":description" => $experience->getDescription(),
            ":name" => $experience->getName(),
            ":type_of_contract" => $experience->getContractType(),
            ":id_cv" => $experience->getCvId()
        ]);

        return $this->pdo->lastInsertId();
    }

    /**
     * Récupération d'une experience en fonction de son identifiant
     *
     * @param int $id Identifiant de l'experience à récupérer
     * @return Experience|null Renvoi de l'expérience si il en trouve un, sinon on renvoit null
     */
    public function getById(int $id): ?Experience
    {
        $req = $this->pdo->prepare("SELECT * FROM experience WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        // Parser les données récupérées
        // Instancier une nouvelle experience qu'on retourne avec les données récupérées

        if (!empty($result)) {
            $exp = new Experience();
            $exp->setId($result['id']);

            return $exp
                ->setStartDate($result['starting_date'])
                ->setEndDate($result['ending_date'])
                ->setLocation($result['location'])
                ->setDescription($result['description'])
                ->setName($result['name'])
                ->setContractType($result['type_of_contract'])
                ->setCvId($result['id_cv']);
        } else {
            return null;
        }
    }

    /**
     * Edition d'un expérience
     *
     * @param Experience $experience expérience à éditer
     */
    public function edit($experience): void
    {
        $req = $this->pdo->prepare("UPDATE experience
                            SET id = :id,
                            starting_date = :starting_date,
                            ending_date = :ending_date,
                            location = :location,
                            description = :description,
                            name = :name,
                            type_of_contract = :type_of_contract,
                            id_cv = :id_cv
                            WHERE id = :id");
        $req->execute([
            ":id" => $experience->getId(),
            ":starting_date" => $experience->getStartDate(),
            ":ending_date" => $experience->getEndDate(),
            ":location" => $experience->getLocation(),
            ":description" => $experience->getDescription(),
            ":name" => $experience->getName(),
            ":type_of_contract" => $experience->getContractType(),
            ":id_cv" => $experience->getCvId()
        ]);
    }

    /**
     * Suppression d'une expérience
     *
     * @param int $id Identifiant de l'expérience à supprimer
     */
    public function delete(int $id): void
    {
        $req = $this->pdo->prepare("DELETE FROM experience WHERE id = :id");
        $req->execute([
            ":id" => $id
        ]);
    }
}

