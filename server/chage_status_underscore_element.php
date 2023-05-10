<?php

#ottiene la stringa dal file json
$stringa_dati_json = file_get_contents('dati_json.json');
#converte la stringa  json in un array associativo per poterla lavorare
$elements_array = json_decode($stringa_dati_json, true);





#ottine dalla chiamata POST l'indice dell'elemento dove dovrà andare a lavorare
$chage_status_element_index = $_POST['status_chage_element_index'];
#sostituisce il valore della chiava underscore dell'elemento corispondente all'indice passatogli dalla chiamata axiosPOST con il suo opposto
$elements_array [$chage_status_element_index]["underscore"] = !$elements_array [$chage_status_element_index]["underscore"];




#converte l'array associativo in una stringa json
$new_stringa_dati_json = json_encode($elements_array);
#va a sostituire il contenuto dell file json con la stringa creata in precedenza
file_put_contents('dati_json.json', $new_stringa_dati_json);
#abilita la lettura da parte della pagina
header('Content-Type: application/json');
#abilita la condivisione all indirizzo http://localhost:5173
header("Access-Control-Allow-Origin: http://localhost:5173");
#bypass la protezione cors
header("Access-Control-Allow-Headers: X-Requested-With");
#restituisce alla pagina la stringa modificata di tipo json
echo $new_stringa_dati_json;
