<!-- Banner -->
<section id="banner">
        <h2>TrainApp</h2>
        <p>Regístrate y forma parte de nuestro equipo.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="loginform">
        <ul class="actions">
            <li><p>Nombre</p><input type="text" minlength="3" maxlength="20" name="user"></li>
            <li><p>Usuario</p><input type="text" minlength="4" maxlength="16" name="alias"></li>
            <li><p>Contraseña</p><input type="password" minlength="6" maxlength="32" name="password"></li>
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