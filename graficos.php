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
        <form action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
            <select name='title' id="select">
            <option disabled selected>Selecciona</option>
            <option disabled>--------------------HOMBROS--------------------</option>
            <?php loadSelect("HOMBROS"); ?>
            <option disabled>-------------------- PECHO --------------------</option>
            <?php loadSelect("PECHO"); ?>
            <option disabled>--------------------ESPALDA--------------------</option>
            <?php loadSelect("ESPALDA"); ?>
            <option disabled>---------------------BRAZOS--------------------</option>
            <?php loadSelect("BRAZOS"); ?>
            <option disabled>--------------------PIERNAS--------------------</option>
            <?php loadSelect("PIERNAS"); ?>
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
        <div class="bar blue" style="height: calc(28em*0.32)"></div>
        <div class="bar purple" style="height: calc(28em*0.56)"></div>
        <div class="bar green" style="height: calc(28em*0.12)"></div>
    </div>
</div>
    <h2 class="info">Registro de <span id="ejercicio">ejercicio</span> de <span id="usuario"><?php echo $user ?></span></h2>
    <?php
    }
        else
         {
            $selected_val = $_POST['title'];
                     
            
            
    ?>        
        <form action='<?php $_SERVER['PHP_SELF']; ?>' method='POST'>
                        <select name='title' id="select">
            <option disabled selected>Selecciona</option>
            <option disabled>--------------------HOMBROS--------------------</option>
            <?php loadSelect("HOMBROS"); ?>
            <option disabled>-------------------- PECHO --------------------</option>
            <?php loadSelect("PECHO"); ?>
            <option disabled>--------------------ESPALDA--------------------</option>
            <?php loadSelect("ESPALDA"); ?>
            <option disabled>---------------------BRAZOS--------------------</option>
            <?php loadSelect("BRAZOS"); ?>
            <option disabled>--------------------PIERNAS--------------------</option>
            <?php loadSelect("PIERNAS"); ?>
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
        <?php
            $sql3 = "SELECT peso FROM historial WHERE user='$user' AND title = '$selected_val'";
            $resultado3 = $bdd->query($sql3);
            while($registro3 = $resultado3->fetch())
                {
                    echo '<div class="bar blue" style="height: calc(28em*('+$registro3['peso']+'*0.1))"></div>';
                }
        ?>
    </div>
</div>
    <h2 class="info">Registro de <span id="ejercicio"><?php echo $selected_val ?></span> de <span id="usuario"><?php echo $user ?></span></h2>
<?php    }
    ?>
    </body>
</html>