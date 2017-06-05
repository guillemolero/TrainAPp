<html>
    <head>
        <title>TrainApp</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="javascript" href="js/bootstrap.js">
        <link rel="javascript" href="js/bootstrap.min.js">
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
                    <li><a href="#elemento1">TrainApp</a></li>
                    <li><a href="#elemento2">Nosotros</a></li>
                  </ul>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>
            </header>
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
                            $nouser = "Introduzca el nombre de su usuario.<br>";
                        }
                    else
                        {
                            $nouser = "";
                        }
                    if(empty($password))
                        {
                            $nopass = "Introduzca su contraseña.";
                        }
                    else
                        {
                            $nopass= "";
                        }
                    ?> <div class="row">
                <section class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="marginlog"><?php
            include "include/login.php";
            ?><div id="error"><?php
            echo $nouser;
            echo $nopass;
            ?>
            </div>
                </section>
               </div>
                
                <?php
                }
            else //en caso de que no sean vacíos, conecto con la base de datos y hago la consulta para comprobar si existe el usuario
                {
//                    $pdo = new PDO('mysql:host=localhost;dbname=Proyecto', 'root', 'q1w2e3r4t5y6');
                    $bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', '');
                    
                    $sql = $bdd->prepare("SELECT user FROM usuarios WHERE user = ? AND password = ?");
                    $sql->bindParam(1, $user);
                    $sql->bindParam(2, $password);
                    $sql->execute();
                    
                    $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
                    if ($filas != null) //fetch para ver si existe el valor introducido
                        {
                            
                            $_SESSION['user'] = $user;
                            header("Location: calendar.php");
                            ?><section class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="elemento3"><?php
                            echo "Sesión iniciada correctamente<br>";
                            echo "Hola, ".$user; //esto solo era para comprobar que me cogiera la variable bien
                            echo "<p><a href='cerrar.php'>Cerrar Sesión</a></p>";
                            
                            ?></section>
                              
                           
                                
                                
                                <?php
                        }
                    else //si con el fetch no encuentra resultados, entra en el else
                        {
                            $error = "Usuario y/o contraseña incorrectos."; 
                            ?> <div class="row">
                <section class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="marginlog"><?php
            include "include/login.php";
            ?><div id="error"><?php
            echo $error;
            ?>
            </div>
                </section>
               </div>
                
                <?php
                            
                        }
     
                }
        }
    
    else
        {
            ?> <div class="row">
                <section class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="marginlog"><?php
            include "include/login.php";
            ?>
                </section>
               </div>
                
                <?php
        }
        ?>
            </div>
            
        <div class="row" id="elementos">
        <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="elemento1">
            <h3>Qué es TrainApp</h3>
             <p>Esta aplicación surge de la idea de ayudar a los deportistas a conseguir resultados en sus entrenamientos
             en el gimnasio.</p>
             <img src="css/imgs/logo2.png"/>
        </section>
        <section class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="elemento2">
                <h3>Nosotros</h3>
                <p>La aplicación es desarrollada por Guillermo Molero y por José Francisco Esparza, estudiantes de
                Diseño Web.</p>
                <img src="css/imgs/ejs.png"/>
        </section>
        </div>
        <footer>
            Copyright © 2017. Web Apps Design. All rights reserved.
        </footer>
        
        
        
    </body>
</html>