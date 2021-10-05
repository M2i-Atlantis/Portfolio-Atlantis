<?php

namespace App\controllers;

use App\models\Training;
use Exception;

class trainingController extends AbstractController
{
    /**
     * create new training
     *
     * @param array $training
     * @param integer $userId
     * @return void
     */
    function new () {

        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if (isset($_SESSION['currentUser']) && "GET" === $request_method) {
            $training = new Training;
            $errors = "error";
            $this->renderer->render(
                ["layout.html.php"],
                ["training", "create.html.php"],
                ["title" => "Ajouter une formation", "training" => $training, "idCv" => $_SESSION['currentUser']->cv_id, "errors" => $errors]
            );

        } elseif ("POST" === $request_method && isset($_SESSION['currentUser'])) {
            $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));
            $args = [
                "school_name" => [],
                "training_name" => [],
                "description" => [],
                "diploma" => [],
                "starting_date" => [],
                "ending_date" => [],
            ];
            $training_post = filter_input_array(INPUT_POST, $args);

            //Instanciation d'une nouvelle formation avec les valeurs récupérées dans le formulaire
            $training = (new Training())
                ->setSchool_name($training_post["school_name"])
                ->setTraining_name($training_post["training_name"])
                ->setDescription($training_post["description"])
                ->setDiploma($training_post["diploma"])
                ->setStarting_date($training_post["starting_date"])
                ->setEnding_date($training_post["ending_date"])
                ->setIdCv($param[2]);
        }

        if (empty($error_messages)) {
            try {
                // Création d'une nouvelle formation et récupération de son identifiant
                $id = Training::create($training);

                // Redirection sur l'affiche de l'article nouvellement créée
                header("Location: /cv/$param[2]");
                $this->renderer->render(
                    ["layout.html.php"],
                    ["training", "create.html.php"],
                    ["title" => "Ajouter une formation", "addTraining" => $training]
                );

                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $this->renderer->render(
                ["layout.html.php"],
                ["training", "create.html.php"],
                ["title" => "Ajouter une formation", "addTraining" => $training]
            );

        }
    }

    public function showById(): void
    {

        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));

        try {
            $trainingModel = Training::getById($param[2]);

            if ($trainingModel instanceof Training) {
                $this->renderer->render(
                    ["layout.html.php"],
                    ["training", "edit.html.php"],
                    ["title" => "Toutes les formations", "training" => $trainingModel, "idCv" => $_SESSION['currentUser']->cv_id]
                );

            } else {
                header("Location: /");
                exit;
            }
        } catch (Exception $e) {
            echo $e->getMessage();

        }
    }

    public function edit()
    {

        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
        $countError = 0;

        try {

            if ("GET" === $request_method) {

                $trainingModel = Training::getById($param[2]);

                $this->renderer->render(
                    ["layout.html.php"],
                    ["training", "edit.html.php"],
                    ["title" => "Modifer la formation", "training" => $trainingModel, "idCv" => $_SESSION['currentUser']->cv_id]
                );

            } elseif ("POST" === $request_method) {

                $args = [
                    "school_name" => [],
                    "training_name" => [],
                    "description" => [],
                    "diploma" => [],
                    "starting_date" => [],
                    "ending_date" => [],
                    "idCv" => [],
                ];

                $training_post = filter_input_array(INPUT_POST, $args);

                // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
                foreach ($training_post as $key => $val) {

                    if (empty(trim($val))) {
                        $countError += 1;
                        $_SESSION["error_msg"] = $key . " inexistant";
                    }

                    if ($countError === 0) {

                        // enregistre les modification en base de donnée et recupere les éléments pour les afficher
                        $editTraining = (new Training())
                            ->setSchool_name($training_post["school_name"])
                            ->setTraining_name($training_post["training_name"])
                            ->setDescription($training_post["description"])
                            ->setDiploma($training_post["diploma"])
                            ->setStarting_date($training_post["starting_date"])
                            ->setEnding_date($training_post["ending_date"])
                            ->setIdCv($training_post["idCv"]);

                        $editTraining->edit($training_post, $param[2]);
                        header(sprintf("Location: /cv/%d", $editTraining->getIdCv()));

                    }
                }
            }

        } catch (Exception $e) {

            $e->getMessage() . PHP_EOL . "</br>";

        }
    }

    public function delete(): void
    {

        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));

        $delete = Training::delete($param[2]);

        if ($delete === true) {

            header("Location /");

        } else {

            echo "delete failed";

        }
    }

}
