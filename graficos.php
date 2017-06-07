<!DOCTYPE html>
<html>
    <head>
        <title>Gráficos</title>
        <link rel="stylesheet" href="css/graficos.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="javascript" href="js/bootstrap.js">
        <link rel="javascript" href="js/bootstrap.min.js">
    </head>
    <body>
        <?php
            require_once('calendar/bdd.php');
            require_once('calendar/loadSelect.php');
            require_once('calendar/loadHistorial.php');
            $bdd = connectDB();
            session_start();
            $user = $_SESSION['user'];
           
        if (!$_POST)
        {?>
        <form id="graphicforms" action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
        <select name='title' id="select">
            <option disabled selected>Selecciona</option>
            <optgroup label="HOMBROS">  <!--OPTGROUP es simplemente una manera de almacenar options en un select, si ves el código de la pagina veras que es una tonteria-->
            <?php loadSelect("HOMBROS"); ?>
            </optgroup>
            <optgroup label="PECHO">
            <?php loadSelect("PECHO"); ?>
            </optgroup>
            <optgroup label="ESPALDA">
            <?php loadSelect("ESPALDA"); ?>
            </optgroup>
            <optgroup label="BRAZOS">
            <?php loadSelect("BRAZOS"); ?>
            </optgroup>
            <optgroup label="PIERNAS">
            <?php loadSelect("PIERNAS"); ?>
            </optgroup>
        </select>
        <select name='time' id="select2"> <!--SELECT seleccionar el periodo de tiempo del ejercicio, primero todos los meses-->
            <option disabled selected>Selecciona el rango de tiempo</option>
            <optgroup label="Mes">
                <option>Enero</option>
                <option>Febrero</option>
                <option>Marzo</option>
                <option>Abril</option>
                <option>Mayo</option>
                <option>Junio</option>
                <option>Julio</option>
                <option>Agosto</option>
                <option>Septiembre</option>
                <option>Octubre</option>
                <option>Noviembre</option>
                <option>Diciembre</option>
            </optgroup>
            <optgroup label="Año">
                <option>2017</option>
                <option>2018</option> <!--He metido el año 2018 para que no esté solamente el 2017, pero evidentemente no saca resultados-->
            </optgroup>
            <option disabled=""><br></option> <!--Esto es una mierda que me he inventado para que hubiera un espacio en blanco entre los años y el 'desde siempre'-->
            <option>Desde siempre</option> <!--Esto ya para que lo saque tal cual sin filtro de tiempo-->
        </select>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <div id ="npeso">
            Peso levantado en kgs
        </div>
<div class="chart-container">
    <div class="y-value value-100">100</div>
    <div class="y-value value-90">90</div>
    <div class="y-value value-80">80</div>
    <div class="y-value value-70">70</div>
    <div class="y-value value-60">60</div>
    <div class="y-value value-50">50</div>
    <div class="y-value value-40">40</div>
    <div class="y-value value-30">30</div>
    <div class="y-value value-20">20</div>
    <div class="y-value value-10">10</div>
    <div class="y-value value-0">0</div>
    <div class="chart">
    </div>
</div>
    <h2 class="info">Registro de <span id="ejercicio">ejercicio</span> de <span id="usuario"><?php echo $user ?></span></h2>
    <?php
    }
        else
         {
            $selected_val = $_POST['title']; //variable que guarda el ejercicio
            $selected_val2 = $_POST['time']; //variable que guarda el intervalo de tiempo
    ?>        
        <form id="graphicforms" action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
        <select name='title' id="select">
            <option disabled selected>Selecciona</option>
            <optgroup label="HOMBROS">
            <?php loadSelect("HOMBROS"); ?>
            </optgroup>
            <optgroup label="PECHO">
            <?php loadSelect("PECHO"); ?>
            </optgroup>
            <optgroup label="ESPALDA">
            <?php loadSelect("ESPALDA"); ?>
            </optgroup>
            <optgroup label="BRAZOS">
            <?php loadSelect("BRAZOS"); ?>
            </optgroup>
            <optgroup label="PIERNAS">
            <?php loadSelect("PIERNAS"); ?>
            </optgroup>
        </select>
        <select name='time' id="select2">
            <option disabled selected>Selecciona el rango de tiempo</option>
            <optgroup label="Mes">
                <option>Enero</option>
                <option>Febrero</option>
                <option>Marzo</option>
                <option>Abril</option>
                <option>Mayo</option>
                <option>Junio</option>
                <option>Julio</option>
                <option>Agosto</option>
                <option>Septiembre</option>
                <option>Octubre</option>
                <option>Noviembre</option>
                <option>Diciembre</option>
            </optgroup>
            <optgroup label="Año">
                <option>2017</option>
                <option>2018</option>
            </optgroup>
            <option disabled=""><br></option>
            <option>Desde siempre</option>
        </select>
                        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <div id ="npeso">
            Peso levantado en kgs
        </div>
<div class="chart-container">
    <div class="y-value value-100">100</div>
    <div class="y-value value-90">90</div>
    <div class="y-value value-80">80</div>
    <div class="y-value value-70">70</div>
    <div class="y-value value-60">60</div>
    <div class="y-value value-50">50</div>
    <div class="y-value value-40">40</div>
    <div class="y-value value-30">30</div>
    <div class="y-value value-20">20</div>
    <div class="y-value value-10">10</div>
    <div class="y-value value-0">0</div>
    <div class="chart">
        <?php //Empieza la chefranada
            if ($selected_val2 == "Desde siempre") //consulta sin intervalo de tiempo si se selecciona desde siempre
                {
                    $sql3 = "SELECT peso FROM historial WHERE user='$user' AND title = '$selected_val'";
                }
            else //aqui entra si no es desde siempre
                { //un primer if para comprobar si el valor es un mes
                    if ($selected_val2 == 'Enero' || $selected_val2 == 'Febrero' || $selected_val2 == 'Marzo' ||
                            $selected_val2 == 'Abril' || $selected_val2 == 'Mayo' || $selected_val2 == 'Junio' ||
                            $selected_val2 == 'Julio' || $selected_val2 == 'Agosto' || $selected_val2 == 'Septiembre' ||
                            $selected_val2 == 'Octubre' || $selected_val2 == 'Noviembre' || $selected_val2 == 'Diciembre')
                        {
                            //declaro un array que no tiene NADA que ver con $selected_val2, es propio de php
                            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
                                'Agosto', 'Semptiembre', 'Octubre', 'Noviembre', 'Diciembre']; 

                            for ($i = 0; $i < count($meses); $i++) //bucle de 12 vueltas
                                {
                                    if ($selected_val2 == $meses[$i]) //comparo $selected_val2 con mi array, si es que sí entra en el if
                                        {
                                            $mesSql = $i +1; //el mes con el que haré la consulta es igual a la posición del array +1 porque
                                                             // el array empieza en 0 pero el primer mes del datetime es 1, así se iguala
                                            $sql3 = "SELECT peso FROM historial WHERE user='$user' AND title = '$selected_val'"
                                            . "AND substring(start, 7, 1) = '$mesSql'";
                                            //substring(nombrecampodelatabla, posicionenlaqueestáelcaracterquequiero, cuantoscaracterescojo)
                                            //si miras el datetime, la septima posicion es donde está el mes, solo cojo un valor porque con ese numero me vale
                                        }
                                }
                        }
                    else
                        {
                            $sql3 = "SELECT peso FROM historial WHERE user='$user' AND title = '$selected_val'"
                                    . "AND substring(start, 1, 4) = '$selected_val2'";
                                    //substring(nombrecampodelatabla, posicionenlaqueestáelcaracterquequiero, cuantoscaracterescojo)
                                    //cojo los primero cuatro numeros, que son el año
                        }
                }
            $resultado3 = $bdd->query($sql3);
            $i = 0;
            while($registro3 = $resultado3->fetch())
                {
                    $i++;
                    $valor = $registro3['peso']*0.28;
                    echo '<div class="bar blue" style="height: '.$valor.'em"></div>';
                }
        ?>
    </div>
</div>
    <div class="pesosesion"> <!--Esto es para sacar el peso que pone abajo de cada barra de la grafica, que funciona igual
                                 que la chefranada de arriba-->
        <?php
            $substring = 'substring(peso, 1, 4)'; //substring para sacar los cuatro primeros caracteres del peso en vez de la cadena entera
            if ($selected_val2 == "Desde siempre")
                {
                    $sql4 = "SELECT $substring FROM historial WHERE user='$user' AND title = '$selected_val'";
                }
            else 
                { 
                    if ($selected_val2 == 'Enero' || $selected_val2 == 'Febrero' || $selected_val2 == 'Marzo' ||
                            $selected_val2 == 'Abril' || $selected_val2 == 'Mayo' || $selected_val2 == 'Junio' ||
                            $selected_val2 == 'Julio' || $selected_val2 == 'Agosto' || $selected_val2 == 'Septiembre' ||
                            $selected_val2 == 'Octubre' || $selected_val2 == 'Noviembre' || $selected_val2 == 'Diciembre')
                        {
                            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
                                'Agosto', 'Semptiembre', 'Octubre', 'Noviembre', 'Diciembre']; 

                            for ($i = 0; $i < count($meses); $i++)
                                {
                                    if ($selected_val2 == $meses[$i])
                                        {
                                            $mesSql = $i +1;
                                            $sql4 = "SELECT $substring FROM historial WHERE user='$user' AND title = '$selected_val'"
                                            . "AND substring(start, 7, 1) = '$mesSql'";
                                        }
                                }
                        }
                    else
                        {
                            $sql4 = "SELECT $substring FROM historial WHERE user='$user' AND title = '$selected_val'"
                            . "AND substring(start, 1, 4) = '$selected_val2'";
                        }
                }
            $resultado4 = $bdd->query($sql4);
            $j = 0;
            while($registro4 = $resultado4->fetch())
                {
                    $j++;
                    $peso = $registro4[$substring];
                    echo '<div class="pesograf">'.$peso.'</div>';
                }
        ?>
    </div>
    <h2 class="info">Registro de <span id="ejercicio"><?php echo $selected_val ?></span> de <span id="usuario"><?php echo $user ?></span>:
        <span id='intervalo'><?php echo $selected_val2 ?></span></h2>
<?php    }
    ?>
    </body>
</html>
