<?php
require_once('bdd.php');



function loadSelect($zona){
    
    $bdd = connectDB();
    
    $sql = $bdd->prepare("SELECT NOMBRE FROM ejercicios WHERE ZONA = ?");
    $sql->bindParam(1, $zona);
    $sql->execute();
    
    $filas = $sql->fetchAll(PDO::FETCH_COLUMN);
    for($i=0; $i<count($filas); $i++)
{
    echo "<option value='$filas[$i]'> $filas[$i] </div>";
}
    
}