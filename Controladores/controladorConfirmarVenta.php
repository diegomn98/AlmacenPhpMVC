<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOventaCaja.php';
include_once '../Modelos/Caja.php';
session_start();

$codigoVenta = $_REQUEST['codigoVenta'];


try{
$venderCaja = DAOventaCaja::venderCaja($codigoVenta);
} catch (ventaIncorrectaException $error){
    header("Location: ../Vistas/vistaErrores.php?id=8&mensaje=$error");exit;
}

$_SESSION['cajaVendida'] = $venderCaja;

header("Location: ../Vistas/vistaCajaVendida.php?id=1&codigo=$codigoVenta");



