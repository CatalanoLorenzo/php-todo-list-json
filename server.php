<?php
$stringa_dati_json = file_get_contents('dati_json.json');

header('Content-Type: application/json');
echo $stringa_dati_json;
function add_element_into_array_json($array_dati_json, $new_element)
{
    array_unshift($array_dati_json, $new_element);
    $new_stringa_dati_json = json_encode($array_dati_json);
    file_put_contents('dati_json.json', $new_stringa_dati_json);
}
$add_element = $_POST['add_element'];
if (!empty($add_element)) {

    add_element_into_array_json($array_dati_json, $add_element);
}
?>