<?php

require_once('functions/bdd.php');
require_once('functions/loadSelect.php');

$bdd = connectDB();

$sql = "SELECT id, user, title, start, end, color FROM historial WHERE user='$user' ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();
?>

