<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <link rel="stylesheet" href="../assets/css/login.css">
    </head>
    <?php
    $id = $_REQUEST['id'];
    $error = $_REQUEST['mensaje'];
    ?>
    <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;../assets/img/warehouse.jpg&quot;);">
        <form class="login" action="Controladores/controladorLogin.php" style="width: 450px;">
            <h1 class="login-title" style="color: red; "><?php
                if ($id == 13) {
                echo $error;
                }else if ($id == 14) {
                echo $error;
                }else if($id == 15){
                    echo $error;
                }else if($id == 16){
                    echo $error;
                }
                ?></h1>
            <p class="login-lost"><a href="../registroUsuario.php">Registro</a></p>
            <p class="login-lost"><a href="../login.php">Volver inicio Sesión</a></p>
        </form>
    </body>
</html>
