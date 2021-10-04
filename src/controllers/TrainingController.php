<?php

namespace App\controllers;

use App\models\Training;
use Exception;

class trainingController
{
    /**
     * get all user training by userId
     *
     * @return void
     */
    public function getAll()
    {
        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $training = [];
        if (!isset($userId)) {

            $training = Training::getAll($this->userId);

        } else {

            echo "You are not logged or register";
            header("location: ./views/login.php");

        }

        // Démarage de la mise en tampon
        ob_start();
        $title = 'Les Formations';
        $training;
        // Appel de la vue
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "article", "index.html.php"]);
        // Récupération et enregistrement des données dans une variable et suppression de la mémoire tampon
        $content = ob_get_clean(); // Equivaut à ob_get_content() suivi de ob_end_clean()
        // Appel du layout
        require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

    }

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

        if (isset($userId) && "GET" === $request_method) {

        } elseif ("POST" === $request_method && isset($_SESSION[""])) {
            $args = [
                "school_name" => [],
                "training_name" => [],
                "description" => [],
                "diploma" => [],
                "starting_date" => [],
                "ending_date" => [],
                "id_cv" => [],
            ];
            $training_post = filter_input_array(INPUT_POST, $args);
        }
        //Instanciation d'une nouvelle formation avec les valeurs récupérées dans le formulaire
        $training = (new Training())
            ->setSchool_name($training_post["school_name"])
            ->setTraining_name($training_post["training_name"])
            ->setDescription($training_post["description"])
            ->setDiploma($training_post["diploma"])
            ->setStarting_date($training_post["starting_date"])
            ->setEnding_date($training_post["ending_date"])
            ->setId_cv($training_post["id_cv"]);

        if (empty($error_messages)) {
            try {
                // Création d'une nouvelle formation et récupération de son identifiant
                $id = Training::create($training, $_SESSION[""]);
                // Redirection sur l'affiche de l'article nouvellement créée
                header(sprintf("Location: /article/%d/show", $id));
                exit;
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            // Démarage de la mise en tampon
            ob_start();
            $title = 'Nouvel article';
            // Appel de la vue
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
            // Récupération et enregistrement des données dans une variable et suppression de la mémoire tampon
            $content = ob_get_clean();
            // Appel du layout
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
        }
    }

    public function show(): void
    {

        if (!$_SESSION['currentUser']) {
            header("Location: /");
        }

        $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));

        try {
            $trainingModel = Training::getById($param[2]);

            if ($trainingModel instanceof Training) {
                ob_start();
                $title = $trainingModel["training_name"];
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "training", "show.html.php"]);
                $content = ob_get_clean();
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

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

        // if (!$_SESSION['currentUser']) {
        //     header("Location: /");
        // }

        $param = explode("/", filter_input(INPUT_SERVER, "REQUEST_URI"));
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");
        $countError = 0;

        try {

            $trainingModel = Training::getById($param[2]);

            if (!$trainingModel instanceof Training) {

                header("Location: /");
                exit();

            } elseif ("GET" === $request_method) {

                ob_start();
                $title = "Editer {$trainingModel["training_name"]}";
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "training", "edit.html.php"]);
                $content = ob_get_clean();
                require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);

            } elseif ("POST" === $request_method) {
                $args = [
                    "school_name" => [],
                    "training_name" => [],
                    "description" => [],
                    "diploma" => [],
                    "starting_date" => [],
                    "ending_date" => [],
                    "id_cv" => [],
                ];

                $training_post = filter_input_array(INPUT_POST, $args);

                // Vérification qu'on n'a pas reçu de champs vide ou rempli d'espace
                foreach ($training_post as $key => $val) {

                    if (empty(trim($val))) {
                        $countError += 1;
                        $_SESSION["error_msg"] = $key . " inexistant";
                    }

                    if ($countError == 0) {
                        // enregistre les modification en base de donnée et recupere les élémnts pour les afficher
                        $editTraining = new Training;
                        $editTraining->edit($training_post, $param[2]);
                        return $editTraining;
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
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if ($request_method === "DELETE") {

            $delete = Training::delete($param[2]);

            if ($delete === true) {

                header("Location /");

            } else {

                echo "delete failed";

            }
        }
    }

}
