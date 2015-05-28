<?php

    require_once 'framework/Model.php';
    
    /**
      * Modèle pour la table translations
      *
      * @author Jeff Muraro
      */
    
    class TranslationsModel extends Model {
        function getTranslation($idLanguage, $idText) {
            $request = $this->execRequest(
                'SELECT * FROM translations WHERE idLanguage=:idLanguage AND idText=:idText',
                array('idLanguage'=>$idLanguage,'idText'=>$idText));

            if (count($request)==1){
                return $request->fetch();
            } else {
                return null;
            }
        }
        
        function insertTranslation($idLanguage, $idText, $translation) {
            if($this->getTranslation($idLanguage, $idText) === null)
            {
                $result = $this->execRequest ("INSERT INTO translations(idLanguage, idText, Translation) ".
                    "VALUES (:idLanguage,:idText,:Translation)",
                    array("idLanguage"=>$idLanguage, "idText"=>$idText,"Translation"=>$translation));
            } else {
                $result = $this->execRequest ("UPDATE translations "
                    . "SET idLanguage=:idLanguage, idText=:idText, Translation=:Translation "
                    . "WHERE idLanguage=:idLanguage AND idText=:idText",
                    array("idLanguage"=>$idLanguage, "idText"=>$idText, "Translation"=>$translation));
            }

            return $result;
        }
    }