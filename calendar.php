<?php 

session_start();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $nombre = $_SESSION['nombre'];
    
} else {
    header('Location: index.php');
}

include 'functions/calendarFunctions.php';

?>
<!DOCTYPE HTML>
<html>
	<?php include 'include/calendarHead.php'; ?>
	<?php include 'include/calendarBody.php'; ?>
</html>