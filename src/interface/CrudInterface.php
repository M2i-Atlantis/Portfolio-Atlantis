<?php

// function en commun entre Experience, Trainings, 
// CRUD Update Create Read Delete 

namespace App\interface;

use App\models\BaseEntity;

//use App\interface;

interface CrudInterface {
    /**
     * Récupération de tous les enregistrements
     *
     */
    public function getAll(): array;

    /**
     * Récupération d'un enregistrement en fonction de son identifiant
     *
     * @param int $id Identifiant de l'enregistrement à récupérer
     * @return BaseEntity Renvoi l'enregistrement si il en trouve un, sinon renvoi null
     */
    public function getById(int $id): ?BaseEntity;

    /**
     * Insertion d'un nouvel article
     *
     * @param BaseEntity $record Enregistrement à insérer
     * @return int Identifiant de l'enregistrement nouvellement créée
     */
    public function create(BaseEntity $record): int;

    /**
     * Modification d'un enregistrement
     *
     * @param BaseEntity $record à éditer
     */
    public function edit(BaseEntity $record): void;

    /**
     * Suppression d'un enregistrement
     *
     * @param int $id Identifiant de l'enregistrement à supprimer
     */
    public function delete(int $id): void;
}

?>