<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../Modelos/CajaConLeja.php';
include_once '../Modelos/Caja.php';
include_once '../DAO/DAOlistadoCaja.php';

session_start();

$conexion->set_charset("utf8");

try{
    $listadoCajas = DAOlistadoCaja::listadoCaja();
} catch(inventarioCajaVacioException $error) {
    header("Location: ../Vistas/vistaErrores.php?id=6&mensaje=$error");exit;
}

$_SESSION['listadoCaja'] = $listadoCajas;

header("Location: ../Vistas/vistaListadoCaja.php?id=1");
