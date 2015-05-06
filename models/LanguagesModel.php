<?php

require_once 'framework/Model.php';

/**
 * Modèle pour la table languages
 *
 * @author Pascal Comminot
 */
class LanguagesModel extends Model {

/**
 * Recupère la liste entière des langues de la table Language
 * @return array tableaux des langues
 */
    public function getLanguages() {
        $languages = $this->execRequest('SELECT * FROM languages');
        return $languages;
    }
    
    /**
     * Récupère les infos de la langue dont l'id est passé en paramètre
     * @param string $idLanguage id de la langue
     * @return array tableau associatif contenant les infos de la langue
     */
    public function getLanguage($idLanguage){
        $request = $this->execRequest(
                'SELECT * FROM languages WHERE idLanguage=:idLanguage', 
                array('idLanguage'=>$idLanguage));
   
        if (count($request)==1){
            return $request->fetch();
        } else {
            return null;
        }
    }
    
    /**
     * Modifie les infos de la langue. Comme l'id est une chaine de caractère,
     * on peut la modifier
     * @param string $oldIdLanguage ancien id de la langue ou null si c'est une nouvelle langue
     * @param string $idLanguage id de la langue
     * @param strimg $languageName nom de la langue
     * @return int nombre d'enregistrement modifié par la requête (idéalement 1)
     */
    public function setLanguage($oldIdLanguage, $idLanguage, $languageName, $Enabled) {
        if ((empty($oldIdLanguage)) or ($this->getLanguage($oldIdLanguage)=== null)){
            $result = $this->execRequest ("INSERT INTO languages(idLanguage,LanguageName,Enabled) ".
                    "VALUES (:idLanguage,:languageName,:Enabled)", 
                    array("idLanguage"=>$idLanguage, "languageName"=>$languageName,"Enabled"=>$Enabled));
        } else {
            $result = $this->execRequest ("UPDATE languages "
                    . "SET idLanguage=:idLanguage, languageName=:languageName, Enabled=:Enabled "
                    . "WHERE idLanguage=:oldIdLanguage", 
                    array("idLanguage"=>$idLanguage, "languageName"=>$languageName, "oldIdLanguage"=>$oldIdLanguage,"Enabled"=>$Enabled));
        }
        return $result;
    }
   
    /**
     * Supprime la langue passée en paramètre
     * @param string $idLanguage id de la langue
     * @return int nombre d'enregistrement supprimé (idéalement 1)
     */
    public function deleteLanguage($idLanguage) {
        $result = $this->execRequest(
                'DELETE FROM languages WHERE idLanguage=:idLanguage', 
                array('idLanguage'=>$idLanguage));        
        return $result;
    }
}
