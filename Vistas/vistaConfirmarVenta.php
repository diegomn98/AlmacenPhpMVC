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
        <title>Confirmar Venta</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
    </head>

    <?php
    include "../Modelos/Caja.php";

    session_start();

    $caja = $_SESSION['caja'];

    $id = $_REQUEST['id'];

    if ($id == 1) {
        ?>
        <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;../assets/img/warehouse.jpg&quot;);">
            <div>
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color:rgb(226,230,46);">
                    <div class="container"><a class="navbar-brand" href="../index.php" style="font-family:Anton, sans-serif;font-size:30px;color:rgb(8,0,0);">Almacén Diego</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div
                            class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mr-auto" style="font-family:Anton, sans-serif;font-size:20px;color:rgb(0,0,0);">
                                <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Caja</a>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../Controladores/controladorCaja.php">Alta Caja</a><a class="dropdown-item" role="presentation" href="../Controladores/controladorListadoCaja.php">Listado Cajas</a></div>
                                </li>
                                <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Estantería</a>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../altaEstanteria.php">Alta Estantería</a><a class="dropdown-item" role="presentation" href="../Controladores/controladorListadoEstanteria.php">Listado Estantería</a></div>
                                </li>
                                <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Gestión de Almacén</a>
                                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="../ventaCaja.php">Ventas</a><a class="dropdown-item" role="presentation" href="../devolucionCaja.php">Devoluciones</a></div>
                                </li>
                                <li class="nav-item" role="presentation "><a class="nav-link" href="../Controladores/controladorListado.php">Inventario</a>
                                </li>
                            </ul></div>
                    </div>
                </nav>
            </div>

            <div style="opacity:0.9;margin:9%;width:80%;">
                <form action="../Controladores/controladorConfirmarVenta.php">
                    <table border="2px" style="background-color:rgb(226,230,46);" align="center" width="500px">
                        <tr align="center">
                            <th colspan="2">Datos de la Caja</th>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Código&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="text" id="codigoVenta" name="codigoVenta" readonly value="<?php echo $caja->getCodigo() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Color&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="color" disabled value="<?php echo $caja->getColor() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Altura (cm)&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="number" readonly value="<?php echo $caja->getAlto() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Profundidad (cm)&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="number" readonly value="<?php echo $caja->getProfundidad() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Anchura (cm)&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="number" readonly value="<?php echo $caja->getAncho() ?>"/>&nbsp;
                            </td>

                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Contenido&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="text" readonly value="<?php echo $caja->getContenido() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                &nbsp;Material&nbsp; 
                            </td>
                            <td align="center">
                                &nbsp;<input type="text" readonly value="<?php echo $caja->getMaterial() ?>"/>&nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><button id="confirmarVenta" name="confirmarVenta">Confirmar Venta</button></td>
                        </tr>
                        
                    </table>
                </form>
            </div>

            <?php
        }
        ?>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
