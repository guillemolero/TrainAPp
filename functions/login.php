<?php

if(isset($_SESSION['user']))
    {
        header("Location: calendar.php");
    }

if (isset($_POST['login']))
    {
        $user = $_POST['user'];
        $password = md5($_POST['password']);
        if (empty($user) || empty($password))
            {
                if (empty($user) && empty($password))
                    {
                        $nouser = "Introduzca sus credenciales";
                        $nopass = "";
                    }
                else
                    {
                        if(empty($user))
                            {
                                $nouser = "Introduzca el nombre de su usuario.<br>";
                                $nopass = "";
                            }
                        if(empty($password))
                            {
                                $nouser = "";
                                $nopass = "Introduzca su contraseña.";
                            }
                    }
            }
        else 
            {
                $bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', '');
                //$bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', 'q1w2e3r4t5y6');
                $sql = $bdd->prepare("SELECT nombre FROM usuarios WHERE user = ? AND password = ?");
                $sql->bindParam(1, $user);
                $sql->bindParam(2, $password);
                $sql->execute();

                $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
                if ($filas != null)
                    {
                        print_r($filas);
                        $_SESSION['user'] = $user;
                        $_SESSION['nombre'] = implode("",$filas[0]);
                        header("Location: calendar.php");
                    }
            }      
    }
else
    {
        $nouser = "";
        $nopass = "";
    }
