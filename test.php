<?php
//.php para probar funciones

include "functions/database.php";
include "functions/users.php";



$filas = loadSelect("HOMBROS");

print_r($filas);




?>
