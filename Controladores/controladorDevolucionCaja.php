<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOdevolucionCaja.php';
include_once '../Modelos/Caja.php';
//Estanterias Disponibles
include_once '../DAO/DAOañadirCaja.php';

session_start();

$codigoCajaDevolucion = $_REQUEST['codigoCajaDevolucion'];

try{
$datosBackup = DAOdevolucionCaja::datosCajaBackup($codigoCajaDevolucion);
}catch(cajaNoEncontradaException $error){
    header("Location: ../Vistas/vistaErrores.php?id=10&mensaje=$error");exit;
}


//Estanterias Disponibles
$estanteriasDisponibles = DAOañadirCaja::estanteriasDisponibles();

$_SESSION['estanteriasDisponibles'] = $estanteriasDisponibles;

$_SESSION['datosBackup'] = $datosBackup;


header("Location: ../Vistas/vistaConfirmarDevolucion.php?id=1&codigoCajaDevolucion=$codigoCajaDevolucion");


