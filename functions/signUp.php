<?php
$nouser = "";
$nopass = "";
$noalias = "";
require_once('bdd.php');

if (isset($_POST['login']))
    {
        $user = $_POST['user'];
        $password = $_POST['password'];
        $alias = $_POST['alias'];
        if (empty($user) || empty($password))
            {
                if (empty($user) && empty($password) && empty($alias))
                    {
                        $nouser = "Introduzca de las credenciales a crear";
                        $nopass = "";
                        $noalias = "";
                    }
                else
                    {
                        if(empty($user))
                            {
                                $nouser = "Introduzca el nombre del usuario a crear.<br>";
                                $nopass = "";
                                $noalias = "";
                            }
                        if(empty($password))
                            {
                                $nouser = "";
                                $nopass = "Introduzca la contraseña.<br>";
                                $noalias = "";
                            }
                        if(empty($alias))
                            {
                                $nouser = "";
                                $nopass = "";
                                $noalias = "Introduzca el alias del usuario.";
                            }
                    }
            }
        else 
            {
                $bdd = connectDB();
                $password=md5($password);
                $sql = $bdd->prepare("INSERT INTO usuarios (nombre, password, user) VALUES (?, ?, ?)"); //las interrogaciones son los parametros
                $sql->bindParam(1, $user);
                $sql->bindParam(2, $password);
                $sql->bindParam(3, $alias);
                
                
                if($sql->execute()){
                    header('Location: index.php');
                } else {
                    $nouser = "";
                    $nopass = "";
                    $noalias = "Usuario ya existente.";
                } 
                
                
            }      
    }

