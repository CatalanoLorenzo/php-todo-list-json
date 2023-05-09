<?php
$stringa_dati_json = file_get_contents('dati_json.json');

$element_array = json_decode($stringa_dati_json,true);
#echo'bhjo';
$add_element = $_POST['add_element'];
/* function add_element_into_array_json( $new_element,$element_array)
{
    #echo 'funzione di aggiunta elemento';
   
    #var_dump($element_array);
} */
array_unshift($element_array, $add_element);

$new_stringa_dati_json = json_encode($element_array);
file_put_contents('dati_json.json', $new_stringa_dati_json);
#add_element_into_array_json($add_element,$element_array);
/* if (!empty($add_element)) {
} */
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Headers: X-Requested-With");
echo $new_stringa_dati_json;