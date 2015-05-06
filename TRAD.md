# Traduction du framework
Marin Verstraete - <verstraete.marin@gmail.com>

FR -> EN

## État au 12.03.2015

Fait
* Traduction des noms de fichiers
* Traduction du code
* Traduction des dossiers
* Traduction des strings de chemins dans le code
* Securité (.htaccess, etc.)

## Dossiers
* Config -> config
* Contenu -> contents
  * css
  * img
  * js
* Controleur -> controllers
* Framework -> framework
* Modele -> models
* Vue -> views
  * erreur.php -> error.php
  * gabarit.php -> template.php

## index.php
* $routeur -> $router

## Routeur.php -> Router.php
* routerRequete() -> routeRequest()
* creerControleur() -> createController()
* creerAction() -> createAction()
* gererErreur() -> handleError()

## Controleur.php -> Controller.php
* $requete -> $request
* setRequete() -> setRequest()
* executerAction() -> execAction()
* genererVue() -> buildView()

## Requete.php -> Request.php
* $parametres -> $params
* existeParametre() -> paramExists()
* getParametre() -> getParam()

## Vue.php -> View.php
* $fichier -> $file
* $titre -> $title
* generer() -> build()
* genererFichier() -> genFile()
* nettoyer() -> sanitize()

## Configuration.php -> Config.php
* $parametres -> $cfgParams
* getParametres() -> getParams()

## Modele.php -> Model.php
* $bdd -> $db
* executerRequete() -> execRequest()
* getBdd() -> getDB()
