<?php

require_once 'framework/Controller.php';

/**
 * Controleur par défaut
 *
 * @author Marin Verstraete
 */
class HomeController extends Controller {

    public function index() {
        $this->buildView();
    }
}
