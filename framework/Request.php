<?php

/**
 * Classe modélisant une requête HTTP entrante
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */
class Request {

    /** Tableau des paramètres de la requête */
    private $params;

    /**
     * Constructeur
     *
     * @param array $params Paramètres de la requête
     */
    public function __construct($params) {
        $this->params = $params;
    }

    /**
     * Renvoie vrai si le paramètre existe dans la requête
     *
     * @param string $name Nom du paramètre
     * @return bool Vrai si le paramètre existe et sa valeur n'est pas vide
     */
    public function paramExists($name) {
        return (isset($this->params[$name]) && $this->params[$name] != "");
    }

    /**
     * Renvoie la valeur du paramètre demandé
     *
     * @param string $name Nom du paramètre
     * @return string Valeur du paramètre
     * @throws Exception Si le paramètre n'existe pas dans la requête
     */
    public function getParam($name) {
        if ($this->paramExists($name)) {
            return $this->params[$name];
        }
        else {
            throw new Exception("Paramètre '$name' absent de la requête");
        }
    }

}
