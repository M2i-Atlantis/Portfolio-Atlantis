<?php

use App\models\Training;

class trainingController
{

    /**
     * get all user training by userId
     *
     * @return void
     */
    public static function index($userId)
    {
        if (!isset($userId)) {

            $training = Training::getAll($userId);
            var_dump($training);

        } else {

            return "You are not logged or register";
            header("location: ./views/login.php");

        }

        // Démarage de la mise en tampon
        ob_start();
        $title = 'All Training';
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
    function new (array $training, int $userId) {
        $request_method = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        if (isset($userId) && "GET" === $request_method) {
            $trainingModel = new Training();
            return $trainingModel->create($training[], $userId);
        } elseif ("POST" === $request_method && isset($userId)) {
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
        // Instanciation d'une nouvelle formation avec les valeurs récupérées dans le formulaire
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
                $id = (new Training())->create($training, $userId);
                // Redirection sur l'affiche de l'article nouvellement créée
                header(sprintf("Location: /article/%d/show", $id));
                exit;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            // Démarage de la mise en tampon
            ob_start();
            $title = 'Nouvel article';
            // Appel de la vue
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, 'training', 'new.html.php']);
            // Récupération et enregistrement des données dans une variable et suppression de la mémoire tampon
            $content = ob_get_clean();

            // Appel du layout
            require implode(DIRECTORY_SEPARATOR, [TEMPLATES, "layout.html.php"]);
        }

    }

}
