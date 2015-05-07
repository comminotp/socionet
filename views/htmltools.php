<?php


/**
 * Construit un élément SELECT basé sur le tableau associatif $list, 
 * sélectionnant l'option $courant, et ajoute les éventuels attributs à
 * la balise select 
 * @param string $name nom du champ de saisie
 * @param array $list tableau associatif value=>texte de l'option
 * @param mixed $current sert à indiquer l'option initialement sélectionnée
 * @param array $attributes tableau associatif comportant des attributs 
 *      complémentaires à ajouter à la balise SELECT
 * @return string élement html select prêt à l'emploi
 * @author Pascal Comminot
*/
function select($name, $list, $current, $attributes=null) {
    $text = '<select name="' . $name . '" ';
    if (is_array($attributes)) {
        foreach ($attributes as $attr => $val) {
            $text .= $attr . '="' . $val . '" ';
        }
    }
    $text .= ">\n";

    foreach ($list as $option => $val) {
        if ($option == $current) {
            $text .= "<option value=\"$option\" selected=\"selected\">$val</option>\n";
        }
        else {
            $text .= "<option value=\"$option\" >$val</option>\n";
        }
    }
    $text .= "</select>";
    return $text;
}

function AssociativeArray($SourceArray,$KeyColumn,$ValueColumn)
{
    $DestArray = array();
    foreach($SourceArray as $Line)
    {
      $DestArray[$Line[$KeyColumn]] = $Line[$ValueColumn];
    }
    return $DestArray;   
}