<?php

$stringa_dati_json = file_get_contents('dati_json.json');

$element_array = json_decode($stringa_dati_json, true);

$add_text = $_POST['add_element'];

$add_element = [ 
    "text" => $add_text,
    "underscore" => false,
];

array_unshift($element_array, $add_element);

$new_stringa_dati_json = json_encode($element_array);

file_put_contents('dati_json.json', $new_stringa_dati_json);

header('Content-Type: application/json');

header("Access-Control-Allow-Origin: http://localhost:5173");

header("Access-Control-Allow-Headers: X-Requested-With");

echo $new_stringa_dati_json;