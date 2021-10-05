<?php
namespace App\dao;

use App\models\Training;
use core\Database;
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

    public function create(array $training): int
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
            $query->bindParam(":school_name", $training["chool_name"]);
            $query->bindParam(":training_name", $training["training_name"]);
            $query->bindParam(":description", $training["description"]);
            $query->bindParam(":diploma", $training["diploma"]);
            $query->bindParam(":starting_date", $training["startng_date"]);
            $query->bindParam(":ending_date", $training["ending_date"]);
            $query->bindParam(":id_cv", $userId);

            $query->execute();

            return $this->dbHandler->lastInsertId();

        } catch (PDOException $e) {
            "Creating new train failed";
            echo $e->getMessage() . PHP_EOL . "</br>";

        }

    }

    public function getAll(int $userId): array
    {
        try {

            $query = $this->dbHandler->prepare("SELECT * FROM training WHERE id_cv = :userId");
            $query->execute(["userId" => $userId]);
            $results = $query->fetchObject(Training::class);

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
                                            WHERE id = :id"
            );

            $query->bindParam(":school_name", $training["school_name"]);
            $query->bindParam(":training_name", $training["training_name"]);
            $query->bindParam(":description", $training["description"]);
            $query->bindParam(":diploma", $training["diploma"]);
            $query->bindParam(":starting_date", $training["starting_date"]);
            $query->bindParam(":ending_start", $training["ending_start"]);
            $query->bindParam(":id_cv", $training["id_cv"]);
            $query->bindParam(":id", $training_id);
            $query->execute();

            return $query->fetchObject(Training::class);

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
