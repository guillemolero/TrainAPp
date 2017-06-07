<?php

require_once('bdd.php');

function loadHistorial($user, $title, $rango){
    
    $pdo = connectDB();
    
    if($title = "Todo"){
        
        if ($rango == "Desde siempre")
                {
                    $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user'";
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
                                            $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user'"
                                            . "AND substring(start, 7, 1) = '$mesSql'";
                                           
                                        }
                                }
                        }
                    else
                        {
                            $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user'"
                                    . "AND substring(start, 1, 4) = '$rango'";
                        }
                }
        
    } else {
        if ($rango == "Desde siempre")
                {
                    $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user'";
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
                                            $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user' AND title = '$title'"
                                            . "AND substring(start, 7, 1) = '$mesSql'";
                                           
                                        }
                                }
                        }
                    else
                        {
                            $sql = "SELECT title, start, peso, repeticiones, series FROM historial WHERE user='$user' AND title = '$title'"
                                    . "AND substring(start, 1, 4) = '$rango'";
                        }
                }
    }
    
    
    $req = $pdo->prepare($sql);
    $req->execute();
    
    $total = 0;
    
            while($retorno = $req->fetch())
                {
                    $total++;
                    ?>
                    
                        <tr>
                            <td><strong>fecha: </strong><?php echo substr($retorno['start'],0,10); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><strong>ejercicio: </strong><?php echo $retorno['title']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><strong>peso: </strong><?php echo substr($retorno['peso'],0,4); ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><strong>repeticiones: </strong><?php echo $retorno['repeticiones']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                            <td><strong>series: </strong><?php echo $retorno['series']; ?></td>
                        </tr>
                  <?php  
                }
                
                if($total == 0){
                    
                    ?>
                    <div class='itemHistorial'>
                        <p>
                            <strong>No hay ejercicios </strong>
                        </p>
                    </div>
                     <?php
                }
    
}


