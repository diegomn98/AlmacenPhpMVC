<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Devolución de Caja</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="assets/css/styles.min.css">
    </head>
    <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;assets/img/warehouse.jpg&quot;);">
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
    
    <div style="opacity:0.9;margin:9%;width:80%;">

        <form action="Controladores/controladorDevolucionCaja.php">
            <table border="2px" style="background-color:rgb(226,230,46);" align="center" width="500px">
                <tr align="center">
                    <th colspan="2">Devolución de Caja</th>
                </tr>


                <tr>
                    <td align="center">
                        &nbsp;Código&nbsp; 
                    </td>
                    <td align="center">
                        &nbsp;<input type="text" id="codigoCajaDevolucion" name="codigoCajaDevolucion" maxlength="12" required />&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button id="seleccionarDevolucion" name="seleccionarDevolucion">Seleccionar</button></td>
                </tr>
            </table>
        </form>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
