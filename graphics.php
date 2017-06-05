<?php 

session_start();

if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $nombre = $_SESSION['nombre'];
} else {
    header('Location: index.php');
}

?>
<!DOCTYPE HTML>
<html>
	<?php include 'include/graphicsHead.php'; ?>
	<?php include 'include/graphicsBody.php'; ?>
</html>