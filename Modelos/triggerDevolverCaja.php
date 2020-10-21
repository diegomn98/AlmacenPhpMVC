<?php 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$borrarTrigger = "DROP TRIGGER IF EXISTS triggerDevolucion";

$resultado2 = $conexion->query($borrarTrigger)or die("Error en el Trigger");

//Datos de CajaBackup

$idCaja = $caja->getId();
$codigoCaja = $caja->getCodigo();
$colorCaja = $caja->getColor();
$alturaCaja = $caja->getAlto();
$profundidadCaja = $caja->getProfundidad();
$anchuraCaja = $caja->getAncho();
$contenidoCaja = $caja->getContenido();
$materialCaja = $caja->getMaterial();
$fechaAltaCaja = $caja->getFechaAlta();

//Datos propios de Caja Backup
$idEstanteriaActualizada = $_SESSION['estanteria'];
$codigoEstanteria = $caja->getCodigoEstanteria();
$lejaActualizada = $_SESSION['leja'];
$numeroLeja = $caja->getNumeroLeja();
$fechaVenta = $caja->getFechaVenta();



$trigger = "CREATE TRIGGER triggerDevolucion AFTER DELETE ON caja_backup FOR EACH ROW"
        . " BEGIN"
        . " INSERT INTO caja VALUES (null,'$codigoCaja','$colorCaja',$alturaCaja,$profundidadCaja,$anchuraCaja,'$contenidoCaja','$materialCaja','$fechaAltaCaja');"
        . " "
        . " INSERT INTO ocupacion VALUES(null,(SELECT id FROM caja WHERE codigo = '$codigoCaja'),$idEstanteriaActualizada,$lejaActualizada);"
        . ""
        . " UPDATE estanteria SET nLejasOcupadas = nLejasOcupadas +1 WHERE id = '".$idEstanteriaActualizada."';"
        . ""
        . "END;";

$resultado3 = $conexion->query($trigger);
        



            
