<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOdevolucionCaja.php';

session_start();

$codigoCajaDevuelta = $_REQUEST['codigoDevolucion'];

$estanteria = $_REQUEST['origen'];
$leja = $_REQUEST['destino'];

$_SESSION['estanteria'] = $estanteria;
$_SESSION['leja'] = $leja;


$caja = DAOdevolucionCaja::datosCajaBackup($codigoCajaDevuelta);

$conexion->autocommit(false);
$evaluar = true;

try {
    $confirmarDevolucion = DAOdevolucionCaja::funcionTrigger($caja);
} catch (devolucionIncorrectaException $error) {
    header("Location: ../Vistas/vistaErrores.php?id=11&mensaje=$error");
    exit;
}

if ($confirmarDevolucion != 1) {
    $evaluar = false;
}

if ($evaluar == true) {
    $conexion->commit();
    $conexion->autocommit(true);
} else {
    $conexion->rollback();
}

$_SESSION['devolverDevolucion'] = $confirmarDevolucion;

header("Location: ../Vistas/vistaCajaDevuelta.php?id=1&codigoCajaDevuelta=$codigoCajaDevuelta");
