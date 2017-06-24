<?php
            require_once('functions/bdd.php');
            require_once('functions/loadSelect.php');
            require_once('functions/loadHistorial.php');
            $bdd = connectDB();
            //session_start();
            $user = $_SESSION['user'];
            
            
           ?>
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
            <option disabled=""><br></option><!--Esto es una mierda que me he inventado para que hubiera un espacio en blanco entre los años y el 'desde siempre'-->
            <option>Todo</option>
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
            <button type="submit" class="btn btn-primary">Mostrar</button>
        </form> 