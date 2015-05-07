<?php
require_once 'framework/Model.php';

class InstitutionModel extends Model {

    public function InsertData($nom, $adresse, $coordonnees, $description, $logo, $image)
    {
	$InsertDesc = $dbh->prepare("INSERT INTO texts VALUES('', :description)");

	//On met en param�tre ce qu'on veut ajouter dans la base
	$InsertDesc->bindParam(':description', $description, PDO::PARAM_STR);
	$InsertDesc->execute();

	$lid = $dbh->lastInsertId();
	$InsertInstitute = $dbh->prepare("INSERT INTO institutions VALUES('', :nom, :adresse, :coordonnees, $lid, :logo, :image)");

	$InsertInstitute->bindParam(':nom', $nom, PDO::PARAM_STR);
	$InsertInstitute->bindParam(':adresse', $adresse, PDO::PARAM_STR);
	$InsertInstitute->bindParam(':coordonnees', $coordonnees, PDO::PARAM_STR);
	$InsertInstitute->bindParam(':logo', $logo, PDO::PARAM_STR);
	$InsertInstitute->bindParam(':image', $image, PDO::PARAM_STR);

	$InsertInstitute->execute();
	
	header('Location: ./Formulaire_institution.php');
    }
}
?>