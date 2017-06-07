<!-- Banner -->
<section id="banner">
        <h2>TrainApp</h2>
        <p>Regístrate y forma parte de nuestro equipo.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="loginform">
        <ul class="actions">
            <li><p>Nombre Completo</p><input type="text" name="user"></li>
            <li><p>Alias</p><input type="text" name="alias"></li>
            <li><p>Contraseña</p><input type="password" name="password"></li>
            <br>
            <li id="error"><?php
            echo $nouser;
            echo $nopass;
            echo $noalias;
            ?></li>
        </ul>
            <input type ="submit" value="Regístrate" name="login"><br><br>
        </form>
</section>