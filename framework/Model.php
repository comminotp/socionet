<?php

require_once 'Config.php';

/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO de PHP
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */
abstract class Model {

    /** Objet PDO d'accès à la BD
        Statique donc partagé par toutes les instances des classes dérivées */
    private static $db;

    /**
     * Exécute une requête SQL
     *
     * @param string $sql Requête SQL
     * @param array $params Paramètres de la requête
     * @return PDOStatement Résultats de la requête
     */
    protected function execRequest($sql, $params = null) {
        if ($params == null) {
            $result = self::getDB()->query($sql);   // exécution directe
        }
        else {
            $result = self::getDB()->prepare($sql); // requête préparée
            $result->execute($params);
        }
        return $result;
    }

    /**
     * Renvoie un objet de connexion à la BDD en initialisant la connexion au besoin
     *
     * @return PDO Objet PDO de connexion à la BDD
     */
    private static function getDB() {
        if (self::$db === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Config::get("dsn");
            $user = Config::get("user");
            $pwd = Config::get("pwd");
            // Création de la connexion
            self::$db = new PDO($dsn, $user, $pwd,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$db;
    }
    
    /**
     * Retourne l'id du dernier enregistrement créé par cette connexion
     * @return mixed id du dernier enregistrement
     */
    
    protected function lastInsertId() {
        return self::getDB()->lastInsertId();
    }

}
