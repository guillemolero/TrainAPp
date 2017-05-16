<html>
    <head>
        <title> TrainApp </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php
                    session_start();
                      //$pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    $bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', '');
//                    $error = $pdo->errorCode();
                    
                    
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
                    
                    //
                    //en principio esto es innecesario, al ser creado el usuario y almacenado en la sesión ya no hace falta manejar
                    //errores ni BBDD con respecto al usuario
                    //
//                    if ($error != null)
//                        {
//                            echo "ERROR: NO SE PUDO INICIAR SESIÓN. Código de error: ".$error.".";
//                        }
//                    else
//                        {
//                            
//                        }
        ?>
        
    </body>
</html>