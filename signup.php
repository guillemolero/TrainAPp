<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
<?php
    if (isset($_POST['sign'])) //asigna a variables los post y comprueba que no están vacíos
        {   
            $user = $_POST['user'];
            $password = $_POST['password'];
            if (empty($user) || empty($password))
                {
                    if(empty($user))
                        {
                            echo "Introduzca el nombre del usuario a crear.<br>";
                        }
                    if(empty($password))
                        {
                            echo "Introduzca la contraseña del usuario a crear.";
                        }
                }
            else //si ambos valores NO son nulos, conecta con la base de datos y hace el insert de usuario y contraseña con md5
                {
                    $pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', 'q1w2e3r4t5y6');
                    
                    $sql = "INSERT INTO usuarios (nombre, password) VALUES ('$user', '".md5($password)."')";
                    $pdo->query($sql);
                    unset($conexion);
                    echo "<p>Introducción de datos correcta.</p>";
                    echo "<p>Ir a <a href='index.php'>Iniciar sesión</a></p>"; // para volver index con ya nuestro usuario creado
                    ?>
                    <!--Imprimo el formulario por si quiero crear otro usuario nada más crear el nuevo-->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <h1>Crea un usuario</h1>
                </tr>
                <tr>
                    <td><label>Usuario</label></td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td><label>Contraseña</label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="sign" value="Sign"></td>
                </tr>
            </table>
        </form><?php
                }
        }
    
    else
        //Aquí entra si todavía no ha habido post (el formulario sin procesamiento de datos)
        {?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table>
        <tr>
            <h1>Crea un usuario</h1>
        </tr>
        <tr>
            <td><label>Usuario</label></td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="sign" value="Sign"></td>
        </tr>
    </table>
</form>
    </body>
        <?php
        }
        ?>
</html>