<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

$fila = $_SESSION['nuevoUsuario'];

$id = $_REQUEST['id'];

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario Registrado</title>
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>
    <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;../assets/img/warehouse.jpg&quot;);">
        <form class="login" action="Controladores/controladorAltaUsuario.php">
            <h1 class="login-title" style="color: green">Registrado <?php echo $fila ?> Usuario Correctamente</h1>
            <input type="text" class="login-input" value="<?php echo $username ?>" readonly>
            <input type="text" class="login-input" value="<?php echo $password ?>" readonly>
            <p class="login-lost"><a href="../login.php">Iniciar Sesión</a></p>
        </form>
    </body>
</html>