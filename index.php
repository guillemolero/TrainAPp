<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php
        session_start();
//        if(isset($_SESSION['user'])){
//            //header("Location: paginaprincipal.php"); //que nos mande directamente a la app si estamos ya logueados, que no puedan volver al login sin cerrar sesion
//        }
        
    if (isset($_POST['login'])) //si se ha pulsado sobre el botón login
        {   
            $user = $_POST['user'];
            $password = md5($_POST['password']); //almacenamos ya la contraseña encriptada, asi nos ahorramos transformarla para trabajar más adelante con ella
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
                    //$pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    $pdo = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
                    
                    $sql = $pdo->prepare("SELECT nombre FROM usuarios WHERE nombre = ? AND password = ?");
                    $sql->bindParam(1, $user);
                    $sql->bindParam(2, $password);
                    $sql->execute();
                    
                    $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
                    if ($filas != null) //fetch para ver si existe el valor introducido
                        {
                            
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
     
                }
        }
    
    else
        {
            include "include/login.php";
        }
        ?>
    </body>
</html>