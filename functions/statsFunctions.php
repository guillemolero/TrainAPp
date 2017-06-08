<?php

require_once('loadHistorial.php');

if($_POST){
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $rango = $_POST['time'];
    
    if(isset($user) && isset($title) && isset($rango)){
        loadHistorial($user, $title, $rango);
    } else {
        ?>
            <tr>
                <td><strong>Por favor, introduce el ejercicio y el rango de tiempo</strong></td>
            </tr>
        <?php
    }
    
    
}

