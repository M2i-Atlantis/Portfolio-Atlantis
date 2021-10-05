<?php

namespace App\Models;

use App\dao\TrainingDao;

class Training
{

    public function __construct()
    {

    }

    /**
     * ajoute une nouvelle formation
     *
     * @param Training $training
     * @param [type] $userId
     * @return void
     */
    public static function create(array $training)
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
    public static function getAll(int $userId): array
    {
        $dbHandler = new TrainingDao();
        $Training = $dbHandler->getAll($userId);
        return $Training;
    }

    public static function edit(array $training, int $training_id): Training | false
    {
        $dbHandler = new TrainingDao();
        $training = $dbHandler->update($training, $training_id);
        return $training;
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

    public function setSchool_name($school_name)
    {
        return $this->school_name = $school_name;
    }

    public function getSchool_name()
    {
        return $this->school_name;
    }

    public function setTraining_name($training_name)
    {
        return $this->training_name = $training_name;
    }

    public function getTraining_name()
    {
        return $this->training_name;
    }

    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDiploma($diploma)
    {
        return $this->diploma = $diploma;
    }

    public function getDiploma()
    {
        return $this->diploma;
    }

    public function setStarting_date($starting_date)
    {
        return $this->starting_date = $starting_date;
    }

    public function getStarting_date()
    {
        return $this->starting_date;
    }

    public function setEnding_date($ending_date)
    {
        return $this->ending_date = $ending_date;
    }

    public function getEnding_date()
    {
        return $this->ending_date;
    }

}
