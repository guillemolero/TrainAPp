<?php

require_once('bdd.php');

$bdd = connectDB();

if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM historial WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error en la preparación.');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Error en la ejecución.');
	}
	
}elseif (isset($_POST['peso']) && isset($_POST['repeticiones']) && isset($_POST['series']) && isset($_POST['color']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$color = $_POST['color'];
        $peso = $_POST['peso'];
        $repeticiones = $_POST['repeticiones'];
        $series = $_POST['series'];

	$sql = "UPDATE historial SET peso = '$peso', repeticiones = '$repeticiones', series = '$series' WHERE id = $id ";

	
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
header('Location: ../calendar.php');

	
?>
