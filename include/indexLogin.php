<!-- Banner -->
<section id="banner">
        <h2>TrainApp</h2>
        <p>Encuentra tu límite.</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="loginform">
        <ul class="actions">
            <li><p>Usuario</p><input type="text" name="user"></li>
            <li><p>Contraseña</p><input type="password" name="password"></li>
            <br>
            <li id="error"><?php
            echo $nouser;
            echo $nopass;
            ?></li>
        </ul>
            <input type ="submit" value="Entrar" name="login"><br><br>
        </form>
        <input type ="submit" id="learnmorebutton" value="Saber más...">
</section>