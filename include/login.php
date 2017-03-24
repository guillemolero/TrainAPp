<!-- lo he metido en una tabla para que esté todo bien ordenado, podemos ver con bootstrap como queda-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <table>
        <tr>
            <td><label>Usuario</label></td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td><label>Contraseña</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="login" value="Login"></td>
        </tr>
        <!-- he introducido esta parte en un span para darle un formato para que sea la tipica linea pequeña debajo del botón para nuevos usuarios -->
        <tr>
            <td colspan="2"><span class="noUser">¿Aún no estás registrado? <a href="signup.php">¡Regístrate!</a><!--Te lleva al registro, que está al mismo nivel que el index.php--></span></td>
        </tr>
    </table>
</form>
