<!DOCTYPE html>
<html>
    <head>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <title>Gráfico de muestra</title>
    </head>
    <body>
        <?php
            require_once('calendar/bdd.php');
            require_once('calendar/loadSelect.php');
            require_once('calendar/loadHistorial.php');
            $bdd = connectDB();
            session_start();
            $user = $_SESSION['user'];
            
            $sql = "SELECT peso FROM historial WHERE user='$user' AND title='PRESS MILITAR'";
            $resultado = $bdd->query($sql);
            $a = 0;
            while($registro = $resultado->fetch())
                {
                    $peso[$a] = $registro['peso'];
                    $a++;
                }
            $contadorveces = 0;
            for ($i = 0; $i < count($peso); $i++)
                {
                    $contadorveces++;
                }
                
            $sql2 = "SELECT ZONA FROM ejercicios WHERE NOMBRE = 'PRESS MILITAR'";
            $resultado2 = $bdd->query($sql2);
            $zona = '';
            while ($registro2 = $resultado2->fetch())
            {
                $zona = $registro2[0];
            }
               
        ?>
        <div id = "container" style="min-width: 540px; height:590px; margin: 0 auto"></div>
        <script>
            var nombre = '<?php echo $user; ?>';
            var zona = '<?php echo $zona; ?>';
            
            /*for(var i = 0; i < 999999; i++)
                {
                    var peso[i] = '<?php echo $peso[i]?>';
                }*/
            
            Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Progresión del ejercicio de '+nombre+''
    },
    subtitle: {
        text: 'Zona: '+zona+''
    },
    xAxis: {
        categories: []
    },
    yAxis: {
        title: {
            text: 'Peso levantado (Kgs)'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'PRESS MILITAR',
        data: [5.0, 7.5, 8.5, 9, 11, 12.5, 12.5, 15, 16, 16, 18, 18.5] //La cosa es puto meter aquí todos los pesos todas las veces
                                                                       // que se haya hecho el puto ejercicio
    }]
});
        </script>
    </body>