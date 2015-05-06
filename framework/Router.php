<?php

require_once 'Controller.php';
require_once 'Request.php';
require_once 'View.php';

/**
 * Classe de routage des requêtes entrantes.
 *
 * Inspirée du framework PHP de Nathan Davison
 * (https://github.com/ndavison/Nathan-MVC)
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */
class Router {

    /**
     * Méthode principale appelée par le contrôleur frontal
     * Examine la requête et exécute l'action appropriée
     */
    public function routeRequest() {
        try {
            // Fusion des paramètres GET et POST de la requête
            // Permet de gérer uniformément ces deux types de requête HTTP
            $request = new Request(array_merge($_GET, $_POST));

            $controller = $this->createController($request);
            $action = $this->createAction($request);

            $controller->execAction($action);
        }
        catch (Exception $e) {
            $this->handleError($e);
        }
    }

    /**
     * Instancie le contrôleur approprié en fonction de la requête reçue
     *
     * @param Request $request Requête reçue
     * @return Instance d'un contrôleur
     * @throws Exception Si la création du contrôleur échoue
     */
    private function createController(Request $request) {
        // Grâce à la redirection, toutes les URL entrantes sont du type :
        // index.php?controleur=XXX&action=YYY&id=ZZZ

        $controller = "Home";  // Contrôleur par défaut
        if ($request->paramExists('controller')) {
            $controller = $request->getParam('controller');
            // Première lettre en majuscules
            $controller = ucfirst(strtolower($controller));
        }
        // Création du nom du fichier du contrôleur
        // La convention de nommage des fichiers controleurs est : Controleur/Controleur<$controller>.php
        $controllerClass = $controller . 'Controller';
        $controllerFile = "controllers/" . $controllerClass . ".php";
        if (file_exists($controllerFile)) {
            // Instanciation du contrôleur adapté à la requête
            require($controllerFile);
            $controller = new $controllerClass();
            $controller->setRequest($request);
            return $controller;
        }
        else {
            throw new Exception("Fichier '$controllerFile' introuvable");
        }
    }

    /**
     * Détermine l'action à exécuter en fonction de la requête reçue
     *
     * @param Request $request Requête reçue
     * @return string Action à exécuter
     */
    private function createAction(Request $request) {
        $action = "index";  // Action par défaut
        if ($request->paramExists('action')) {
            $action = $request->getParam('action');
        }
        return $action;
    }

    /**
     * Gère une erreur d'exécution (exception)
     *
     * @param Exception $exception Exception qui s'est produite
     */
    private function handleError(Exception $exception) {
        $view = new View('error');
        $view->build(array('msgErreur' => $exception->getMessage()));
    }

}
