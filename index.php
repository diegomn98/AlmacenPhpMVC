<!DOCTYPE html>
<?php
session_start();
$estado = $_SESSION['estado'];

if($estado == false){
    header("Location: login.php");
}
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacén_Diego</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;assets/img/warehouse.jpg&quot;);">
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color:rgb(226,230,46);">
            <div class="container"><a class="navbar-brand" href="index.php" style="font-family:Anton, sans-serif;font-size:30px;color:rgb(8,0,0);">Almacén Diego</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto" style="font-family:Anton, sans-serif;font-size:20px;color:rgb(0,0,0);">
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Caja</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="Controladores/controladorCaja.php">Alta de Caja</a><a class="dropdown-item" role="presentation" href="Controladores/controladorListadoCaja.php">Listado Caja</a></div>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Estantería</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="altaEstanteria.php">Alta de Estantería</a><a class="dropdown-item" role="presentation" href="Controladores/controladorListadoEstanteria.php">Listado Estantería</a></div>
                        </li>
                        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Gestión de Almacén</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="ventaCaja.php">Ventas</a><a class="dropdown-item" role="presentation" href="devolucionCaja.php">Devoluciones</a></div>
                        </li>
                         <li class="nav-item" role="presentation "><a class="nav-link" href="Controladores/controladorListado.php">Inventario</a>
                        </li>
                    </ul></div>
    </div>
    </nav>
    </div>
    <div style="opacity:0.6;margin-left:9%;margin-right: 9%; margin-top: 2%;background-color:gainsboro;height:500px;width:80%;">
        <center><img src="Imagen/bienvenido.jpg"/></center>
    </div>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>