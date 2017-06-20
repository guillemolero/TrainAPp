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

