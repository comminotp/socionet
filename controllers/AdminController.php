<?php

require_once 'framework/Controller.php';
require_once 'models/LanguagesModel.php';
 
/**
 * Controleur pour les langues
 *
 * @author Pascal Comminot
 */
class AdminController extends Controller {

    /**
     * Traitement de la page index. Pour le contrôleur, il n'y a pour l'instant
     * pas grand chose à faire, si ce n'est construire la vue
     */
    public function index() {

        $this->buildView();
    }

    /**
     * Affiche la liste des langues
     */
    public function listLanguages() {
        $languagesModel = new LanguagesModel();

        $this->buildView(array(
            'languages' => $languagesModel->getLanguages()
        ));
    }
    
    /**
     * Construction du formulaire d'édition (ajout et modif) d'une langue
     */
    public function editLanguage() {
        $languagesModel = new LanguagesModel();
        // si l'id est existant, il fait référence à un enregistrement existant
        // sinon il s'agit de l'édition d'un nouvel enregistrement (données initiales=null)
        if ($this->request->paramExists('id')) {
          $language = $languagesModel->getLanguage($this->request->getParam('id'));
        } else {
            $language = null;
        }
        
        // Si on a reçu des données de la base, il faut également initialiser oldIdLanguage
        // Sinon on construit un tableau $language vide utilisable dans la vue
        if ($language !== null) {
            $language['oldIdLanguage'] = $language['idLanguage'];
        } else {
            $language = array('oldIdLanguage'=>'','idLanguage'=>'','LanguageName'=>'','Enabled'=>null);
        }
          
        $this->buildView(array('language'=>$language));
    }
    
    /**
     * Traitement des données fournies par le formulaire d'édition de langue
     * Si les données sont correctes, elles sont enregistrée, sinon le formulaire est
     * réaffiché avec les indications sur les choses à modifier
     */
    public function saveLanguage() {
        
        // Récupération des données du formulaire
        $language['idLanguage'] = $this->request->paramExists('idLanguage') ? 
                trim(strtolower($this->request->getParam('idLanguage'))) : '';
        $language['oldIdLanguage'] = $this->request->paramExists('oldIdLanguage') ? 
                $this->request->getParam('oldIdLanguage') : '';
        $language['LanguageName']= $this->request->paramExists('LanguageName') ? 
                trim($this->request->getParam('LanguageName')) : '';
        $language['Enabled'] = $this->request->paramExists('Enabled');
        
        // Validation du champ idLanguage
        if (strlen($language['idLanguage'])!= 2) {
            $errors['idLanguage'] = "L'id de la langue s'écrit avec 2 caractères";
        }
        
        // Validation du champ LanguageName
        if (empty($language['LanguageName'])) {
            $errors['LanguageName'] = "Le nom de la langue ne peut pas être vide";
        }
        
        // Pas d'erreur, on enregistre
        if (empty($errors)) {
            $languageModel = new LanguagesModel();
            $languageModel->setLanguage(
                    $language['oldIdLanguage'], 
                    $language['idLanguage'], 
                    $language['LanguageName'], 
                    $language['Enabled']);
            $this->buildView($language);
        } else {
            // Sinon, on réaffiche le formulaire d'édition
            $this->buildAlternateView('editLanguage',array('language'=>$language, 'errors'=>$errors));
        }
    }
    
    /**
     * Suppression d'une langue 
     */
    public function deleteLanguage() {
        $languagesModel = new LanguagesModel();
        if ($this->request->paramExists('idLanguage')) {   
           $languagesModel->deleteLanguage($this->request->getParam('idLanguage'));
           
        }  
        $this->redirect('listLanguages');
    }
}
