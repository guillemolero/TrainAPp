<!-- lo he metido en una tabla para que esté todo bien ordenado, podemos ver con bootstrap como queda-->
<div id="contenedorLogin">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">  
            
                <input type="text" class="form-control" name="user" placeholder="Usuario">
                   
            
                <input type="password" class="form-control" name="password" placeholder="Contraseña">
            
            <button type="submit" class="form-control btn btn-default"  name="login">Entrar</button>       
            <!-- he introducido esta parte en un span para darle un formato para que sea la tipica linea pequeña debajo del botón para nuevos usuarios -->    
            <span class="noUser"><p>¿Aún no estás registrado? <a class="noUser"href="signup.php">¡Regístrate!</a></p></span><!--Te lleva al registro, que está al mismo nivel que el index.php-->
    </form>
</div>