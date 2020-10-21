<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;assets/img/warehouse.jpg&quot;);">
        <form class="login" action="Controladores/controladorAltaUsuario.php">
            <h1 class="login-title">Registro Usuario</h1>
            <input type="text" class="login-input" placeholder="Username" autofocus id="username" name="username" required>
            <input type="password" class="login-input" placeholder="Password" id="password" name="password" required>
            <input type="submit" value="Registrarse" class="login-button">
            <p class="login-lost"><a href="login.php">Volver Atrás</a></p>
        </form>
    </body>
</html>