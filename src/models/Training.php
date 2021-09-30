<?php

namespace App\models;

use App\dao\TrainingDao;

class Training
{

    public function __construct()
    {

    }
    // public function __construct(
    //     private string $school_name,
    //     private string $training_name,
    //     private string $description = "",
    //     private bool $diploma,
    //     private string $starting_date,
    //     private string $ending_date = ""
    // ) {
    // }

    public function create(Training $training, $userId)
    {
        $dbHandler = new TrainingDao();
        $newTraining = $dbHandler->create($training[], $userId);
        return $newTraining;
    }

    public function getById(int $id)
    {
        $dbHandler = new TrainingDao();
        $newTraining = $dbHandler->getById($id);
        return $newTraining;
    }

    public static function getAll(int $userId)
    {
        $dbHandler = new TrainingDao();
        $newTraining = $dbHandler->getAll($userId);
        return $newTraining;
    }

    public function setSchool_name($school_name)
    {
        return $this->school_name = $school_name;
    }

    public function setTraining_name($training_name)
    {
        return $this->training_name = $training_name;
    }

    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function setDiploma($diploma)
    {
        return $this->diploma = $diploma;
    }

    public function setStarting_date($starting_date)
    {
        return $this->starting_date = $starting_date;
    }

    public function setEnding_date($ending_date)
    {
        return $this->ending_date = $ending_date;
    }

}
