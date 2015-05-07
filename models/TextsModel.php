<?php

    require_once 'framework/Model.php';
    
    class TextsModel extends Model {
        function getTexts() {
            $texts = $this->execRequest('SELECT * FROM texts');
            return $texts;
        }
    }


