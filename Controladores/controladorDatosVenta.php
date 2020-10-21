<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../DAO/DAOventaCaja.php';


session_start();

$codigoCajaVenta = $_REQUEST['codigoCajaVenta'];

try{
$caja = DAOventaCaja::seleccionarCaja($codigoCajaVenta);
}catch(cajaNoEncontradaException $error){
    header("Location: ../Vistas/vistaErrores.php?id=8&mensaje=$error");exit;
}

$_SESSION['caja'] = $caja;

header("Location: ../Vistas/vistaConfirmarVenta.php?id=1");






