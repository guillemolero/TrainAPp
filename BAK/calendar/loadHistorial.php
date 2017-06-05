<?php

require_once('calendar/bdd.php');

function loadHistorial($user){
    
    $bdd = connectDB();
    $sql = "SELECT id, user, title, start, end, color, registro, tipo FROM historial WHERE user='$user' and registro IS null";

    $req = $bdd->prepare($sql);
    $req->execute();

    $historial = $req->fetchAll(PDO::FETCH_ASSOC);
    
    for($i=0; $i < count($historial); $i++){
        $ej = $historial[$i]['title'];
        $dia = $historial[$i]['start'];
        $dia = substr($dia, 0, -9);
        
        if($historial[$i]['tipo'] == "FUERZA"){
            echo "<h4>".$ej." - ".$dia."</h4>";
            echo "<br>";
            echo "Peso:";
            echo "<input type='number' name='registro[]'>";
            echo "Repeticiones:";
            echo "<input type='number' name='registro[]'>";
            echo "Series:";
            echo "<input type='number' name='registro[]'>";
            echo "<input type='hidden' name='registro[]' value='null'>";
            echo "<input type='hidden' name='registro[]' value='null'>";
            echo "<br><br>";
        } else {
            echo "<h4>".$ej." - ".$dia."</h4>";
            echo "<br>";
            echo "Tiempo:";
            echo "<input type='number' name='registro[]'>";
            echo "Distancia:";
            echo "<input type='number' name='registro[]'>";
            echo "<input type='hidden' name='registro[]' value='null'>";
            echo "<input type='hidden' name='registro[]' value='null'>";
            echo "<input type='hidden' name='registro[]' value='null'>";
            echo "<br><br>";
        }
       
        
    }
}


