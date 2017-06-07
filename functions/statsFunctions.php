<?php

require_once('loadHistorial.php');

if($_POST){
    $user = $_SESSION['user'];
    $title = $_POST['title'];
    $rango = $_POST['time'];
    loadHistorial($user, $title, $rango);
}

