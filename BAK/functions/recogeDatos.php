<?php

require_once("bdd.php");

function recogeDatos($user, $title, $rango){
    
    $pdo = connectDB();
    
    
    if ($rango == "Desde siempre")
                {
                    $sql = "SELECT peso, repeticiones, series FROM historial WHERE user='$user' AND title = '$title'";
                }
            else
                { 
                    if ($rango == 'Enero' || $rango == 'Febrero' || $rango == 'Marzo' ||
                            $rango == 'Abril' || $rango == 'Mayo' || $rango == 'Junio' ||
                            $rango == 'Julio' || $rango == 'Agosto' || $rango == 'Septiembre' ||
                            $rango == 'Octubre' || $rango == 'Noviembre' || $rango == 'Diciembre')
                        {
                           
                            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
                                'Agosto', 'Semptiembre', 'Octubre', 'Noviembre', 'Diciembre']; 

                            for ($i = 0; $i < count($meses); $i++) 
                                {
                                    if ($rango == $meses[$i]) 
                                        {
                                            $mesSql = $i +1; 
                                            $sql = "SELECT peso, repeticiones, series FROM historial WHERE user='$user' AND title = '$title'"
                                            . "AND substring(start, 7, 1) = '$mesSql'";
                                           
                                        }
                                }
                        }
                    else
                        {
                            $sql = "SELECT peso, repeticiones, series FROM historial WHERE user='$user' AND title = '$title'"
                                    . "AND substring(start, 1, 4) = '$rango'";
                        }
                }
    
    $req = $pdo->prepare($sql);
    $req->execute();
    
    $i = 0;
    $total = 0;
    $max = 0;
    $min = 999;
    $media = 0;
            while($retorno = $req->fetch())
                {
                    $i++;
                    $valor = $retorno['peso'];
                    $total = $total + $valor;
                    if($max < $valor){ $max = $valor; }
                    if($min > $valor){ $min = $valor; }
                }
                
                if($total == 0){
                    
                    $noReg = "No hay registros";
                     
                } else {
                    $media = $total / $i;
                    $array = array( "maximo" => $max, "minimo" => $min, "media" => $media, "total" => $total);
                    return $array;
                }
    
}

function calculaRM($user, $ejercicio){
    
}