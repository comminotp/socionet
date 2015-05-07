<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PhonesModel
 *
 * @author MOROUM_INFO
 */
class PhonesModel extends Model{
    //put your code here
    
    function addPhone($PhoneNumber, $idInstitution) {
        $result = $this->execRequest ("INSERT INTO phones(PhoneNumber,idInstitution) ".
                    "VALUES (:PhoneNumber, :idInstitution)", 
                    array("PhoneNumber"=>$PhoneNumber, "idInstitution"=>$idInstitution));        
    }
    
    function getPhonesWithInstitutions() {
        $PhonesNumber = $this->execRequest('SELECT PhoneNumber natural join idInstitustion FROM Phones, Institute');
        return $PhonesNumber;
    }
}
