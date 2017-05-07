<?php


//funcion que devuelve true o false si el usuario es correcto o no
function login($user, $password){
    
    $sql = $pdo->prepare("SELECT user FROM usuarios WHERE user = ? AND password = ?");
    $sql->bindParam(1, $user);
    $sql->bindParam(2, $password);
    
    
    $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        if ($filas != null) //devuelve true si existe el usuario
            { return true; }
        else //devuelve false si no existe
            { return false; }
    
}

//funcion para cerrar la sesion
function logout(){
    
    if ((isset($_SESSION['user']))) //Si se había iniciado sesión anteriormente la cierra
        {
            unset($_SESSION['user']);
            echo "Sesión cerrada.<br><br>";
            header("Location: index.php"); //que cerrar sesión te mande directamente al index, más pro
        }
            //
            //no debería ser necesaria esta parte de abajo, ya que para cerrar sesión tendría que estar ya logueado no? xD
            //
    else //Si no se había iniciado te avisa
        {
            echo "La sesión aún no estaba iniciada.";
            ?><br><a href="index.php">Volver</a><?php
        }
    
}

