<?php

require_once 'framework/Controller.php';
require_once 'models/TestModel.php';

/**
 * Controleur de test
 *
 * @author Marin Verstraete
 */
class AutreController extends Controller {

    public function index() {
        $testModel = new TestModel();

        $this->buildView(array(
            'donnee_de_test' => Config::get('dsn', 'erreur de config'),
            'exemple_html' => '<h1>HTML nettoyé! :)</h1>',
            'billets' => $testModel->getBillets()
        ));
    }
}
