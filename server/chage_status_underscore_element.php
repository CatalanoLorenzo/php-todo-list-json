<?php

$stringa_dati_json = file_get_contents('dati_json.json');

$elements_array = json_decode($stringa_dati_json, true);

$chage_status_element_index = $_POST['status_chage_element_index'];

$elements_array [$chage_status_element_index]["underscore"] = !$elements_array [$chage_status_element_index]["underscore"];

$new_stringa_dati_json = json_encode($elements_array);

file_put_contents('dati_json.json', $new_stringa_dati_json);

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: http://localhost:5173");

header("Access-Control-Allow-Headers: X-Requested-With");

echo $new_stringa_dati_json;
