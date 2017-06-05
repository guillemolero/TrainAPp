<?php
//.php para probar funciones

include "functions/recogeDatos.php";

$user = "guille";

$title = "PRESS MILITAR";
$rango = "Desde siempre";

$array = recogeDatos($user, $title, $rango);

print_r($array);
?>


