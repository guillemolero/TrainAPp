<?php
if (!isset($_POST['login']))
    {
        $nouser = "";
        $nopass = "";
        include 'mainpage.php';
    }
    
else
    {   
        /*$nouser = "";
        $nopass = "";*/
        $user = $_POST['user'];
        $password = md5($_POST['password']);
        if (empty($user) || empty($password))
            {
                include 'mainpage.php';
                if(empty($user))
                    {
                        $nouser = "Introduzca el nombre de su usuario.<br>";
                    }
                if(empty($password))
                    {
                        $nopass = "Introduzca su contraseña.";
                    }
            }
        else 
            {
                $bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', 'q1w2e3r4t5y6');
                $sql = $bdd->prepare("SELECT user FROM usuarios WHERE user = ? AND password = ?");
                $sql->bindParam(1, $user);
                $sql->bindParam(2, $password);
                $sql->execute();

                $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
                if ($filas != null)
                    {
                        $_SESSION['user'] = $user;
                        header("Location: calendar.php");
                    }
                else 
                    {
                        include 'mainpage.php';
                    }
            }      
    }