<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../Modelos/Estanteria.php';
include_once '../DAO/DAOlistadoEstanteria.php';

session_start();

$conexion->set_charset("utf8");

try{
    $listadoEstanterias = DAOlistadoEstanteria::listadoEstanteria();
} catch(inventarioEstanteriaVaciaException $error) {
    header("Location: ../Vistas/vistaErrores.php?id=7&mensaje=$error");exit;
}

$_SESSION['listadoEstanteria'] = $listadoEstanterias;

header("Location: ../Vistas/vistaListadoEstanteria.php?id=1");

