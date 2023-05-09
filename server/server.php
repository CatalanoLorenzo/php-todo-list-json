<?php
$stringa_dati_json = file_get_contents('dati_json.json');

$element_array = json_decode($stringa_dati_json,true);

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: http://localhost:5173");

header("Access-Control-Allow-Headers: X-Requested-With");

echo $stringa_dati_json;
?>