<?php

require_once 'Request.php';
require_once 'View.php';

/**
 * Classe abstraite Controleur
 * Fournit des services communs aux classes Controleur dérivées
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */
abstract class Controller {

    /** Action à réaliser */
    private $action;

    /** Requête entrante */
    protected $request;

    /**
     * Définit la requête entrante
     *
     * @param Request $request Request entrante
     */
    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Exécute l'action à réaliser.
     * Appelle la méthode portant le même nom que l'action sur l'objet Controleur courant
     *
     * @throws Exception Si l'action n'existe pas dans la classe Controleur courante
     */
    public function execAction($action)
    {
        if (method_exists($this, $action)) {
            $this->action = $action;
            $this->{$this->action}();
        }
        else {
            $controllerClass = get_class($this);
            throw new Exception("Action '$action' non définie dans la classe $controllerClass");
        }
    }

    /**
     * Méthode abstraite correspondant à l'action par défaut
     * Oblige les classes dérivées à implémenter cette action par défaut
     */
    public abstract function index();

    /**
     * Génère la vue associée au contrôleur courant
     *
     * @param array $viewData Données nécessaires pour la génération de la vue
     */
    protected function buildView($viewData = array())
    {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);

        // Instanciation et génération de la vue
        $view = new View($this->action, $controller);
        $view->build($viewData);
    }

    protected function buildAlternateView($alternateView,$viewData = array()) {
        // Détermination du nom du fichier vue à partir du nom du contrôleur actuel
        $controllerClass = get_class($this);
        $controller = str_replace("Controller", "", $controllerClass);
        
        $view = new View($alternateView,$controller);
        $view->build($viewData);
    }
    
    /**
     * Gère une erreur, affiche un message et arrête tout le script
     *
     * @param $errorMessage Le message d'erreur à afficher
     */
    protected function handleError($errorMessage) {
        $view = new View('error');
        $view->build(array('msgErreur' => $errorMessage));

        exit();
    }

    /**
     * Redirige l'utilisateur vers une url
     *
     * @param $url L'url vers laquelle rediriger L'utilisateur
     */
    protected function redirect($url) {
        header('Location: ' . $url);
        exit();
    }
}
