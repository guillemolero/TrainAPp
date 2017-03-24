<html>
    <head>
        <title> TrainApp </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php
                    session_start();
                    $pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    $error = $pdo->errorCode();

                    if ($error != null)
                        {
                            echo "ERROR: NO SE PUDO INICIAR SESIÓN. Código de error: ".$error.".";
                        }
                    else
                        {
                            if ((isset($_SESSION['user']))) //Si se había iniciado sesión anteriormente la cierra
                                {
                                    unset($_SESSION['user']);
                                    echo "Sesión cerrada.<br><br>";
                                    ?><a href="index.php">Volver</a><?php
                                }
                            else //Si no se había iniciado te avisa
                                {
                                    echo "La sesión aún no estaba iniciada.";
                                    ?><br><a href="index.php">Volver</a><?php
                                }
                        }
        ?>
        
    </body>
</html>