<?php

require_once 'framework/Controller.php';
require_once 'models/LanguagesModel.php';

/**
 * Controleur pour les options de la borne (= terminal)
 *
 * @author Marin Verstraete
 */
class TerminalController extends Controller {

    private $isTerminal;
    private $selectedLanguage;
    private $location;

    public function __construct() {
        // Initialise les variables de classe avec des valeurs par défaut si les cookies ne sont pas définits

        // Transforme 'isTerminal' en vrai booléen (les  cookies renvoient des chaines de texte)
        $this->isTerminal = isset($_COOKIE['isTerminal']) ? ($_COOKIE['isTerminal'] == 'true' ? true : false) : false;
        $this->selectedLanguage = isset($_COOKIE['selectedLanguage']) ? $_COOKIE['selectedLanguage'] : 'en';
        $this->location = isset($_COOKIE['location']) ? $_COOKIE['location'] : '';
    }

    /**
     * Liste la configuration actuelle
     */
    public function index() {
        $lanModel = new LanguagesModel();

        $this->buildView(array(
            'isTerminal' => $this->isTerminal,
            'languages' => $lanModel->getLanguages(),
            'selectedLanguage' => $this->selectedLanguage,
            'location' => $this->location
        ));
    }

    /**
     * Modifie la configuration
     */
    public function editConfig() {
        $r = $this->request;

        // Si tous les paramètres sont présents
        if($r->paramExists('isTerminal') && $r->paramExists('selectedLanguage') && $r->paramExists('location')) {
            // 60s * 60m * 24h * 365j = 31536000s
            $yearInSeconds = time() + 31536000;

            setcookie('isTerminal', $r->getParam('isTerminal'), $yearInSeconds);
            setcookie('selectedLanguage', $r->getParam('selectedLanguage'), $yearInSeconds);
            setcookie('location', $r->getParam('location'), $yearInSeconds);
        }
        else {
            $this->handleError('Paramètres manquants.');
        }

        // Une fois le traitement terminé, redirige l'utilisateur vers l'index
        $this->redirect(Config::get('webRoot') . 'terminal');
    }
}
