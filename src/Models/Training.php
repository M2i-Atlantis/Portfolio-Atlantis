<?php

namespace App\models;

use App\dao\TrainingDao;

class Training
{

    private $id;
    private $school_name;
    private $training_name;
    private $description;
    private $diploma;
    private $starting_date;
    private $ending_date;
    private $idCv;

    // public function __construct()
    // {

    // }

    /**
     * ajoute une nouvelle formation
     *
     * @param Training $training
     * @param [type] $userId
     * @return void
     */
    public static function create($training)
    {
        $dbHandler = new TrainingDao();
        $newTraining = $dbHandler->create($training);
        return $newTraining;
    }

    /**
     * recupere une formation par son id
     *
     * @param integer $id
     * @return void
     */
    public static function getById(int $id): Training | false
    {
        echo $id;
        $dbHandler = new TrainingDao();
        $training = $dbHandler->getById($id);
        //var_dump($training);
        return $training;
    }

    /**
     * recupere toutes les formations
     *
     * @param integer $userId
     * @return string|false
     */
    public static function getAll(int $cvId): array
    {
        $dbHandler = new TrainingDao();
        $Training = $dbHandler->getAll($cvId);

        return $Training;
    }

    public static function edit(array $training, int $training_id)
    {
        $dbHandler = new TrainingDao();
        $training = $dbHandler->update($training, $training_id);
        return;
    }

    /**
     * supprimme une formation en fonction de l'id de la formation
     *
     * @param integer $id
     * @return void
     */
    public static function delete(int $id): bool
    {
        $dbHandler = new TrainingDao();
        $delete = $dbHandler->delete($id);
        return $delete;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setSchool_name(string $school_name): self
    {
        $this->school_name = $school_name;
        return $this;
    }

    public function getSchool_name()
    {
        return $this->school_name;
    }

    public function setTraining_name(string $training_name): self
    {
        $this->training_name = $training_name;
        return $this;
    }

    public function getTraining_name()
    {
        return $this->training_name;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDiploma(int $diploma): self
    {
        $this->diploma = $diploma;
        return $this;
    }

    public function getDiploma()
    {
        return $this->diploma;
    }

    public function setStarting_date(string $starting_date): self
    {
        $this->starting_date = $starting_date;
        return $this;
    }

    public function getStarting_date()
    {
        return $this->starting_date;
    }

    public function setEnding_date(string $ending_date): self
    {
        $this->ending_date = $ending_date;
        return $this;
    }

    public function getEnding_date()
    {
        return $this->ending_date;
    }

    public function setIdCv(int $idCv): self
    {
        $this->idCv = $idCv;
        return $this;
    }

    public function getIdCv()
    {
        return $this->idCv;
    }
}
