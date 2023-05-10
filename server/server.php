<?php
#ottiene la stringa dal file json
$stringa_dati_json = file_get_contents('dati_json.json');

#abilita la lettura da parte della pagina
header('Content-Type: application/json');
#abilita la condivisione all indirizzo http://localhost:5173
header("Access-Control-Allow-Origin: http://localhost:5173");
#bypass la protezione cors
header("Access-Control-Allow-Headers: X-Requested-With");
#restituisce alla pagina la stringa modificata di tipo json
echo $stringa_dati_json;
?>