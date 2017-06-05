<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<?php
    if (isset($_POST['sign'])) //asigna a variables los post y comprueba que no están vacíos
        {   
            $user = $_POST['user'];
            $password = md5($_POST['password']); //la contraseña la almacenamos ya en MD5, asi nos ahorramos tener que transformarla para trabajar con ella
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
                    //$pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    $bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', ''); //este es el mio, asi no tenemos que estar borrando y poniendo
                    
                    //en el pdo se usan consultas preparadas (marioly me quitó puntos por esto un puñado de veces)
                    $sql = $bdd->prepare("INSERT INTO usuarios (user, password) VALUES (?, ?)"); //las interrogaciones son los parametros
                    $sql->bindParam(1, $user); //los parámetros se asignan por orden (hay otra forma pero me parece más simple esta)
                    $sql->bindParam(2, $password);
                    $sql->execute();
                    echo "<p>Introducción de datos correcta.</p>";
                    echo "<p>Ir a <a href='index.php'>Iniciar sesión</a></p>"; // para volver index con ya nuestro usuario creado
                    ?>
                    <!--Imprimo el formulario por si quiero crear otro usuario nada más crear el nuevo-->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div id="elemento4">
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
                </div>
        </form><?php
                }
        }
    
    else
        //Aquí entra si todavía no ha habido post (el formulario sin procesamiento de datos)
        {?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div id="elemento4">
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
                </div>
</form>
    </body>
        <?php
        }
        ?>
</html>