<?php

require_once 'Config.php';

/**
 * Classe modélisant une vue
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */
class View {

    /** Nom du fichier associé à la vue */
    private $file;

    /** Titre de la vue (défini dans le fichier vue) */
    private $title;

    /**
     * Constructeur
     *
     * @param string $action Action à laquelle la vue est associée
     * @param string $controleur Nom du contrôleur auquel la vue est associée
     */
    public function __construct($action, $controller = "") {
        // Détermination du nom du fichier vue à partir de l'action et du constructeur
        // La convention de nommage des fichiers vues est : views/<$controleur>/<$action>.php
        $file = "views/";
        if ($controller != "") {
            $file = $file . $controller . "/";
        }
        $this->file = $file . $action . ".php";
    }

    /**
     * Génère et affiche la vue
     *
     * @param array $data Données nécessaires à la génération de la vue
     */
    public function build($data) {
        // Génération de la partie spécifique de la vue
        $content = $this->genFile($this->file, $data);
        // On définit une variable locale accessible par la vue pour la racine Web
        // Il s'agit du chemin vers le site sur le serveur Web
        // Nécessaire pour les URI de type controleur/action/id
        $webRoot = Config::get("webRoot", "/");
        // Génération du gabarit commun utilisant la partie spécifique
        $view = $this->genFile('views/template.php',
                array('title' => $this->title, 'content' => $content, 'webRoot' => $webRoot));
        // Renvoi de la vue générée au navigateur
        echo $view;
    }

    /**
     * Génère un fichier vue et renvoie le résultat produit
     *
     * @param string $file Chemin du fichier vue à générer
     * @param array $data Données nécessaires à la génération de la vue
     * @return string Résultat de la génération de la vue
     * @throws Exception Si le fichier vue est introuvable
     */
    private function genFile($file, $data) {
        if (file_exists($file)) {
            // Rend les éléments du tableau $data accessibles dans la vue
            extract($data);
            // Démarrage de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $file;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();
        }
        else {
            throw new Exception("Fichier '$file' introuvable");
        }
    }

    /**
     * Nettoie une valeur insérée dans une page HTML
     * Permet d'éviter les problèmes d'exécution de code indésirable (XSS) dans les vues générées
     *
     * @param string $value Valeur à nettoyer
     * @return string Valeur nettoyée
     */
    private function sanitize($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
    }

}
