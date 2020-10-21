<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOlistado.php';
include_once '../Modelos/Inventario.php';

session_start();

$conexion->set_charset("utf8");

try{
$inventario = DAOlistado::mostrarListado();
}catch(inventarioVacioException $error){
    header("Location: ../Vistas/vistaErrores.php?id=4&mensaje=$error");exit;
}



$_SESSION['listado'] = $inventario;

header("Location: ../Vistas/vistaListado.php?id=1");