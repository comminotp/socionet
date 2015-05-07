<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InstitutionsModel
 *
 * @author MOROUM_INFO
 */
class InstitutionsModel extends Model{
    //put your code here
    function GetInstitutes() {
        $institutes = $this->execRequest('SELECT * FROM institutions ORDER BY InstitutionName');
        return $institutes;
    }
}
