<?php

namespace core;

/** Valide un tableau de données à partir d'assertions tout en indiquant les messages d'erreurs personnalisés associés */
class Validator {
    private array $errors = [];

    /** Construit un Validator à partir d'un tableau de données */
    public function __construct(private array $data) { }

    /** S'assure que la donnée indiquée ne soit pas vide.
     * Ajoute le message d'erreur indiqué si ce n'est pas le cas.
     * @param keyName Nom de la clef du tableau à vérifier
     */
    public function ensureNotEmpty(string $keyName, string $errorMessage) {
        if (!isset($this->data[$keyName]) || empty($this->data[$keyName]))
            $this->errors[] = $errorMessage;
    }

    /** S'assure que la donnée indiquée soit une date au format YYYY-MM-DD.
     * Ajoute le message d'erreur indiqué si ce n'est pas le cas.
     * @param keyName Nom de la clef du tableau à vérifier
     */
    public function ensureDate(string $keyName, string $errorMessage) {
        if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $this->data[$keyName]))
            $this->errors[] = $errorMessage;
    }

    /** Indique si une erreur de validation de donnée est survenue */
    public function hasErrors() {
        return isset($this->errors[0]);
    }

    /** Obtient la liste des erreurs survenues */
    public function getErrors(): array {
        return $this->errors;
    }

    /** Obtient le tableau de données validé par ce Validator */
    public function getData(): array {
        return $this->data;
    }
}