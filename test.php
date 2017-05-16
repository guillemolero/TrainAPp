<?php
//.php para probar funciones

include "calendar/bdd.php";

$user = "guille";

$bdd = connectDB();
    $sql = "SELECT id, user, title, start, end, color, registro FROM historial WHERE user='$user' and registro IS null";

    $req = $bdd->prepare($sql);
    $req->execute();

    $historial = $req->fetchAll(PDO::FETCH_ASSOC);

    print_r($historial);
    echo $historial[0]['title'];
?>


