<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php
        
    if (isset($_POST['login'])) //si se ha pulsado sobre el botón login
        {   
            $user = $_POST['user'];
            $password = $_POST['password'];
            if (empty($user) || empty($password)) //comprueba que el usuario y la contraseña introducidos no sean campos vacíos
                {
                    if(empty($user))
                        {
                            echo "Introduzca el nombre de su usuario.<br>";
                        }
                    if(empty($password))
                        {
                            echo "Introduzca su contraseña.";
                        }
                    include "include/login.php";
                }
            else //en caso de que no sean vacíos, conecto con la base de datos y hago la consulta para comprobar si existe el usuario
                {
                    $pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    
                    $sql = "SELECT nombre FROM usuarios WHERE nombre='$user' AND password='" .md5($password) . "'";
                    $resultado = $pdo->query($sql);
                    $filas = $resultado->fetch();
                    if ($filas != null) //fetch para ver si existe el valor introducido
                        {
                            session_start();
                            $_SESSION['user'] = $user;
                            //header("Location: paginaprincipal.php"); Aquí nos llevará a la página principal de la app
                            echo "Sesión iniciada correctamente<br>";
                            echo "Hola, ".$user; //esto solo era para comprobar que me cogiera la variable bien
                            echo "<p><a href='cerrar.php'>Cerrar Sesión</a></p>";
                        }
                    else //si con el fetch no encuentra resultados, entra en el else
                        {
                            $error = "Usuario y/o contraseña incorrectos."; 
                            include "include/login.php";
                            echo $error;
                        }
                    unset($resultado);
                    unset($conexion);
                }
        }
    
    else
        {
            include "include/login.php";
        }
        ?>
    </body>
</html>