<?php
// Function for creating one select with many options automatically.
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

// Creating one associative array for using in the function "select".
function AssociativeArray($SourceArray,$KeyColumn,$ValueColumn)
{
    $DestArray = array();
    foreach($SourceArray as $Line)
    {
        $DestArray[$Line[$KeyColumn]] = $Line[$ValueColumn];
    }
    return $DestArray;
}