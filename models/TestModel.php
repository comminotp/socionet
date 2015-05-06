<?php

require_once 'framework/Model.php';

/**
 * Modèle de test
 *
 * @author Marin Verstraete (traduction)
 */
class TestModel extends Model {

    public function getBillets() {
        $billets = $this->execRequest('SELECT * FROM T_BILLET');

        return $billets;
    }
}
