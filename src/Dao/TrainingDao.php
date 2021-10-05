<?php
namespace App\dao;

use App\models\Training;
use core\Database;
use PDO;
use PDOException;

class TrainingDao extends Database
{

    private $dbHandler;

    public function __construct()
    {
        try {

            $this->dbHandler = Database::getInstance()->getConnexion();

        } catch (PDOException $e) {

            echo $e->getMessage() . PHP_EOL . "</br>";
        }

    }

    public function create($training): int
    {
        try {

            $query = $this->dbHandler->prepare("INSERT INTO training (
            school_name,
            training_name,
            description,
            diploma,
            starting_date,
            ending_date,
            id_cv) VALUE (
                :school_name,
                :training_name,
                :description,
                :diploma,
                :starting_date,
                :ending_date,
                :id_cv)");
            $query->bindParam(":school_name", $training->getSchool_name());
            $query->bindParam(":training_name", $training->getTraining_name());
            $query->bindParam(":description", $training->getDescription());
            $query->bindParam(":diploma", $training->getDiploma());
            $query->bindParam(":starting_date", $training->getStarting_date());
            $query->bindParam(":ending_date", $training->getEnding_date());
            $query->bindParam(":id_cv", $training->getIdCv());

            $query->execute();

            return $this->dbHandler->lastInsertId();

        } catch (PDOException $e) {
            "Creating new train failed";
            echo $e->getMessage() . PHP_EOL . "</br>";

        }

    }

    public function getAll(int $cvId): array
    {
        try {

            $query = $this->dbHandler->prepare("SELECT * FROM training WHERE id_cv = :cvId");
            $query->execute(["cvId" => $cvId]);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($results)) {

                return $results;
            } else {
                return null;
            }

        } catch (PDOException $e) {

            "Echec de la recuperation de la formation";
            echo $e->getMessage() . PHP_EOL . "</br>";

        }
    }

    public function getById(int $id): Training | false
    {
        $query = $this->dbHandler->prepare("SELECT * FROM training WHERE id = :id");
        $query->execute([":id" => $id]);
        return $query->fetchObject(Training::class);

    }

    public function update(array $training, int $training_id)
    {
        try {

            $query = $this->dbHandler->prepare("UPDATE training
                                            SET
                                            school_name = :school_name,
                                            training_name = :training_name,
                                            description = :description,
                                            diploma = :diploma,
                                            starting_date = :starting_date,
                                            ending_date = :ending_start,
                                            id_cv= :id_cv
                                            WHERE id = :id");

            $query->bindParam(":school_name", $training["school_name"]);
            $query->bindParam(":training_name", $training["training_name"]);
            $query->bindParam(":description", $training["description"]);
            $query->bindParam(":diploma", $training["diploma"]);
            $query->bindParam(":starting_date", $training["starting_date"]);
            $query->bindParam(":ending_start", $training["ending_start"]);
            $query->bindParam(":id_cv", $training["idCv"]);
            $query->bindParam(":id", $training_id);
            $query->execute();

        } catch (PDOException $e) {
            echo "update failed" . PHP_EOL . $e->getMessage();
        }

    }

    public function delete($id)
    {
        try {

            $query = $this->dbHandler->prepare("DELETE FROM training WHERE id = :id");
            $query->execute([":id" => $id]);
            return true;

        } catch (PDOException $e) {

            echo "Delete Training failed";
            echo $e->getMessage() . PHP_EOL . "</br>";
        }

    }
}
