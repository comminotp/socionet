<?php

require_once 'framework/Model.php';

/**
 * Modèle pour les horaires
 *
 * @author Marin Verstraete
 */
class SchedulesModel extends Model {
    
    /**
     * Insère la description d'un horaire et retourne son id
     */
    public function insertScheduleDescription($idLanguage, $description) {
        $db = $this->getDB();
        
        // Insère le text
        $insertText = $db->prepare("INSERT INTO texts (idText, ShortDescription) VALUES (NULL, 'Courte description');");
        $insertText->execute();
        
        // Garde le dernier ID inséré
        $lastIdText = $db->lastInsertId();
        
        // Insère la description
        $insertTranslation = $db->prepare("INSERT INTO translations (idLanguage, idText, Translation) VALUES (:idLanguage, :lastIdText, :description);");
        $insertTranslation->bindParam(':idLanguage', $idLanguage, PDO::PARAM_INT);
        $insertTranslation->bindParam(':lastIdText', $lastIdText, PDO::PARAM_INT);
        $insertTranslation->bindParam(':description', $description, PDO::PARAM_STR);
        $insertTranslation->execute();
        
        return $lastIdText;
    }
    
    /**
     * TODO
     * Insère un horaire avec sa description
     */
    public function insertSchedule($idInstitution, $stringDays, $startTime, $endTime, $startDate, $endDate, $description, $idLanguage) {
        $db = $this->getDB();

        $idTxtDescription = insertScheduleDescription($idLanguage, $description);

        $insertSchedule = $db->prepare("INSERT INTO schedules (idSchedule, idTxtDescription, idInstitution, Days, StartTime, EndTime, StartDate, EndDate) VALUES (NULL, :idTxtDescription, :idInstitution, :days, :startTime, :endTime, :startDate, :endDate);");
        $insertSchedule->bindParam(':idTxtDescription', $idTxtDescription, PDO::PARAM_INT);
        $insertSchedule->bindParam(':idInstitution', $idInstitution, PDO::PARAM_INT);
        $insertSchedule->bindParam(':days', $stringDays, PDO::PARAM_STR);
        $insertSchedule->bindParam(':startTime', $startTime, PDO::PARAM_STR);
        $insertSchedule->bindParam(':endTime', $endTime, PDO::PARAM_STR);
        $insertSchedule->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $insertSchedule->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $insertSchedule->execute();
    }
}