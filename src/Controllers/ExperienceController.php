<?php

namespace App\Controllers;

use App\dao\ExperienceDao;
use App\dao\ContractDao;
use App\models\Experience;
use App\models\BaseEntity;
use App\models\Contract;
use core\Renderer;
use core\Validator;
use PDOException;

class ExperienceController extends AbstractController
{   
    #region Index

    /**
     * Affiche toutes les expériences
     */
    public function index(int $idCv): void
    {
        // Récupération de toutes les expériences
        try {
            $experiences = (new ExperienceDao())->getByCvId($idCv);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        $this->renderer->render(
            
            ["experience", "index.html.php"],
            ["experience", "show.html.php"],
            ["title" => "Expériences", "experiences" => $experiences, "idCv" => $idCv]);
    }

    #endregion

    #region Création

    /**
     * Crée une nouvelle expérience ou affiche le formulaire de création
     */
    public function create($idCv): void
    {
        $requestMethod = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        switch ($requestMethod) {
            case "GET": {
                // Formulaire de création
                $this->showCreateForm($idCv);
                break;
            }
            case "POST": {
                // Création de l'expérience

                $validator = $this->getFormDataValidator();
                $experience = $this->createExperienceFromFormData($validator->getData());
                $experience->setCvId($idCv);

                if ($validator->hasErrors()) {
                    // Un ou plusieurs erreurs sont survenues => Affichage du formulaire de création avec l'erreur et les données déjà saisies (experience)
                    $errors = $validator->getErrors();
                    $this->showCreateForm($idCv, $experience, $errors);
                }
                else {
                    $experience = $this->createInDataBase($experience);
                    if (isset($experience)) {
                        $this->redirectToRoute("cv", [$idCv]);
                    }
                    else {
                        // Erreur => Réaffichage de la page
                        $this->showCreateForm($idCv, $experience);
                    }
                }
                break;
            }
        }
    }

    /** Affiche le formulaire de création */
    private function showCreateForm(int $idCv, ?Experience $experience = null, ?array $errors = null) { 
        $contracts = (new ContractDao())->getAll();

        $this->renderer->render(
            ["layout.html.php"],
            ["experience", "create.html.php"],
            ["title" => "Nouvelle expérience", "experience" => $experience, "idCv" => $idCv, "contracts" => $contracts, "errors" => $errors]);
    }

    /** Obtient un validateur de données POST purifiés de l'expérience */
    private function getFormDataValidator(): Validator {
        $args = [
            "title" => FILTER_SANITIZE_STRING,
            "startDate" => FILTER_SANITIZE_STRING, // TODO: Améliorer le filtre date
            "endDate" => FILTER_SANITIZE_STRING,
            "typeOfContract" => FILTER_SANITIZE_NUMBER_INT,
            "location" => FILTER_SANITIZE_STRING,
            "description" => FILTER_SANITIZE_STRING,
            "idCv" => FILTER_SANITIZE_NUMBER_INT,
        ]; 
        $expFormData = filter_input_array(INPUT_POST, $args);

        // S'assurer que les champs obligatoires ne sont pas vide
        $validator = new Validator($expFormData);
        $validator->ensureNotEmpty("title", "Aucun intitulé spécifié");
        $validator->ensureNotEmpty("startDate", "Aucune date de début spécifiée");
        $validator->ensureDate("startDate", "Format de date de début incorrect");
        $validator->ensureNotEmpty("typeOfContract", "Aucun type de contrat spécifié");
        $validator->ensureNotEmpty("location", "Aucun lieu spécifié");
        $validator->ensureNotEmpty("idCv", "Aucun CV spécifié");

        return $validator;
    }

    /** Instancie une expérience et l'hydrate/remplie/charge à partir des données du formulaire **/
    private function createExperienceFromFormData(array $expFormData): Experience {
        // Création de l'expérience à partir des données du formulaire
        return (new Experience())
        ->setName($expFormData["title"])
        ->setStartDate($expFormData["startDate"])
        ->setEndDate($expFormData["endDate"])
        ->setLocation($expFormData["location"])
        ->setDescription($expFormData["description"])
        ->setContractType($expFormData["typeOfContract"])
        ->setCvId($expFormData["idCv"]);
    }

    /** Crée l'expérience en BdD */
    private function createInDataBase(Experience $experience): ?Experience {
        try {
            $id = (new ExperienceDao())->create($experience);
            $experience->setId($id);
            return $experience;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    #endregion

    #region Show

    // Obsolète
    // public function show(int $id) {
    //     $experience = (new ExperienceDao())->getById($id);

    //     $this->renderer->render(
    //         ["layout.html.php"],
    //         ["experience", "show.html.php"],
    //         ["title" => $experience->getName(), "experience" => $experience]
    //     );
    // }

    #endregion

    #region Delete

    public function delete(int $id) {
        // Attention, l'opération ne doit pas pouvoir se faire sur GET.
        // Quelqu'un de mal intentionné pourrait faire supprimer une expérience juste en faisant cliquer sur un lien

        $requestMethod = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        $experienceDao = new ExperienceDao();

        switch ($requestMethod) {
            case "GET": {
                $experience = $experienceDao->getById($id);

                $this->renderer->render(
                    ["layout.html.php"],
                    ["experience", "delete.html.php"],
                    ["title" => "Suppression de {$experience->getName()}", "experience" => $experience]
                );
                break;
            }
            case "POST": {
                try {
                    $experience = $experienceDao->getById($id);
        
                    $experienceDao->delete($id);
        
                    $this->redirectToRoute("cv", [$experience->getCvId()]);
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }

    }

    #endregion

    #region Edit

    public function edit(int $id) {
        $requestMethod = filter_input(INPUT_SERVER, "REQUEST_METHOD");

        switch ($requestMethod) {
            case "GET": {
                // Formulaire d'édition
                $experience = (new ExperienceDao())->getById($id);

                $this->showEditForm($experience);

                break;
            }
            case "POST": {
                // Modification de l'expérience

                $validator = $this->getFormDataValidator();
                $experience = $this->createExperienceFromFormData($validator->getData());
                $experience->setId($id);

                if ($validator->hasErrors()) {
                    // Un ou plusieurs erreurs sont survenues => Affichage du formulaire de création avec l'erreur et les données déjà saisies (experience)
                    $errors = $validator->getErrors();
                    $this->showEditForm($experience, $errors);
                }
                else {
                    $this->updateInDataBase($experience);
                    $this->redirectToRoute("cv", [$experience->getCvId()]);
                }

                break;
            }
        }
    }

    /** Affiche le formulaire de modification */
    private function showEditForm(Experience $experience, ?array $errors = null) {
        $contracts = (new ContractDao())->getAll();

        $this->renderer->render(
            ["layout.html.php"],
            ["experience", "edit.html.php"],
            ["title" => "Modifier une expérience", "experience" => $experience, "contracts" => $contracts, "errors" => $errors]);
    }

    /** Modifie l'expérience en BdD */
    private function updateInDataBase(Experience $experience): Experience {
        try {
            (new ExperienceDao())->edit($experience);
            return $experience;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    #endregion
}

?>