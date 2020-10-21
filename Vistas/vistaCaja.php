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
        <title>Alta de Caja</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
        <link rel="stylesheet" href="../assets/css/styles.min.css">
    </head>




    <?php
    include_once '../Modelos/Estanteria.php';

    session_start();

    $estanteriasDisp = $_SESSION['estanteriasDisponibles'];
    ?>

    <body style="background-attachment:fixed;background-position:fixed;background-size:100% 100%;background-repeat:no-repeat;background-image:url(&quot;../assets/img/warehouse.jpg&quot;);">
        <script>
            function control() {
                var campo = document.getElementById("codigoCaja");
                var codigo = campo.value;
                var numeros = /[0-9]/;
                var estado = true;
                
                if (codigo.length < 5) {
                    alert("El codigo debe contener al menos 5 carácteres");
                    estado = false;
                } else{
                    if (codigo.charAt(0) !== "C" || codigo.charAt(1) !== "A" || !(numeros.test(codigo.charAt(2))) || !(numeros.test(codigo.charAt(3))) || !(numeros.test(codigo.charAt(4)))){
                        alert("El codigo debe contener CA y 3 números\nEjemplo: CA999");
                        estado = false;
                    }
                }
                campo.focus();
                return estado;
            }
            
            
        </script>
        <script src="../JavaScript/ajax.js"></script>
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
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div style="opacity:0.9;margin:9%;width:80%;">

            <form action="../Controladores/controladorAñadirCaja.php">
                <table border="2px" style="background-color:rgb(226,230,46);" align="center" width="500px">
                    <tr align="center">
                        <th colspan="2">Alta de Caja</th>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Código&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="text" id="codigoCaja" name="codigoCaja" maxlength="5" required placeholder="CA999" value="CA" />&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Color&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="color" id="colorCaja" name="colorCaja"  maxlength="15" title="Introduce un color" pattern="[A-Za-z]{1,15}" required/>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Altura (cm)&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="number" id="altura" name="altura" maxlength="3" min="25" required placeholder="25-350" title="Debe introducir un numero entre 25-350"/>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Profundidad (cm)&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="number" id="profundidad" name="profundidad" maxlength="3" min="25" required placeholder="25-350" title="Debe introducir un numero entre 25-350"/>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Anchura (cm)&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="number" id="anchura" name="anchura" maxlength="3" min="25" required placeholder="25-350" title="Debe introducir un numero entre 25-350"/>&nbsp;
                        </td>

                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Contenido&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="text" id="contenidoCaja" name="contenidoCaja"  maxlength="15" title="Introduce el contenido de la caja" pattern="[A-Za-z]{1,15}" required/>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            &nbsp;Material&nbsp; 
                        </td>
                        <td align="center">
                            &nbsp;<input type="text" id="materialCaja" name="materialCaja"  maxlength="15" title="Introduce el material de la caja" pattern="[A-Za-z]{1,15}" required/>&nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp;Estanteria&nbsp;</td>
                        <td align="center">
                            <select id="origen" name="origen" onchange="mostrarLejas(this.value)" required="">
                                <option value="">Elige estantería</option>
                                <?php
                                foreach ($estanteriasDisp as $contenido) {
                                    ?><option value="<?php echo $contenido->getId() ?>" required><?php echo "Codigo: " . $contenido->getCodigo() . " Ubicación: " . $contenido->getLetraPasillo() . "-" . $contenido->getNumPasillo() ?></option> <?php
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">&nbsp;Lejas&nbsp;</td>
                        <td align="center">
                            <select id="destino" name="destino" required="">
                                <option value="">Elige leja</option>

                            </select>

                        </td>
                    </tr>
                    <tr>

                        <td colspan="2" align="center"><button id="enviarAltaCaja" name="enviarAltaCaja" onclick="return control();">Añadir Caja</button></td>
                    </tr>


                </table>
            </form>

        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
