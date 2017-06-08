<?php
$nouser = "";
$nopass = "";
require_once ('bdd.php');

if(isset($_SESSION['user']))
    {
        header("Location: calendar.php");
    }

if (isset($_POST['login']))
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
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
                //$bdd = new PDO('mysql:host=localhost;dbname=id1903252_trainapp;charset=utf8', 'id1903252_guillemolero', 'guillegmg8');
                //$bdd = new PDO('mysql:host=localhost;dbname=trainapp', 'root', 'q1w2e3r4t5y6');
                $bdd = connectDB();
                $sql = $bdd->prepare("SELECT nombre, password FROM usuarios WHERE user = ?");
                $sql->bindParam(1, $user);
                $sql->execute();

                $filas = $sql->fetchAll(PDO::FETCH_ASSOC);
                if ($filas != null)
                    {
                        if($filas[0]['password'] == md5($password)){
                            
                            $_SESSION['user'] = $user;
                            $_SESSION['nombre'] = $filas[0]['nombre'];

                            //header("Location: calendar.php");
                        } else {
                            $nouser = "";
                            $nopass = "Contraseña incorrecta.";
                        }
                        
                    }
                else
                    {
                        $nouser= "Usuario incorrecto";
                        $nopass;
                    }
            }      
    }

