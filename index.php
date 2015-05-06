<?php
/**
 * Contrôleur frontal : instancie un routeur pour traiter la requête entrante
 *
 * @version 1.0
 * @author Baptiste Pesquet
 * @author Marin Verstraete (traduction)
 */

require 'framework/Router.php';

$router = new Router();
$router->routeRequest();
