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

    public function create(array $training, int $userId): int
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
                :ending_date
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

            $query = $this->dbHandler->prepare("SELECT * FROM training WHERE id_user = :userId");
            $query->execute(["userId" => $userId]);
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            return $results;

        } catch (PDOException $e) {

            "getting trainnee failed";
            echo $e->getMessage() . PHP_EOL . "</br>";

        }
    }

    public function getById(int $id): ?Training
    {
        $query = $this->dbHandler->prepare("SELECT * FROM training WHERE id = :id");
        $query->execute([":id" => $id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            return (new Training(...$result));
        } else {
            return null;
        }
    }

    public function update(int $id, string $col, string $val)
    {
        $query = $this->dbHandler->prepare("UPDATE training SET $col = :val WHERE id = :id");
        $query->bindParam(":val", $val);
        $query->bindParam(":id", $id);
        $query->execute();

    }

    public function delete($id)
    {

    }
}
