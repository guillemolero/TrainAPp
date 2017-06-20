<?php

// Connexion à la base de données
require_once('bdd.php');

session_start();
$user = $_SESSION['user'];

$bdd = connectDB();
if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color']) && isset($user)){
	
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
        $peso = $_POST['peso'];
        $repeticiones = $_POST['repeticiones'];
        $series = $_POST['series'];

	$sql = "INSERT INTO historial(title, start, end, color, user, peso, repeticiones, series) values ('$title', '$start', '$end', '$color', '$user', '$peso', '$repeticiones', '$series')";
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error en la preparación.');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error en la ejecución.');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
