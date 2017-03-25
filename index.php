<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body> 
        <header>
            <nav class="navbar navbar-default navbar-fixed-top">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">TrainApp</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li><a href="#">TrainApp</a></li>
                    <li><a href="#">Nosotros</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            
            <div class="login">
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
            </div>
            
        </header>
        <section>
            
        </section>
        <section>
            
        </section>
        <footer>
            
        </footer>
        
        
        
    </body>
</html>