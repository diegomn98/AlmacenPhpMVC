<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();

include_once '../DAO/DAOañadirEstanteria.php';
include_once '../Modelos/Estanteria.php';

$conexion->set_charset("utf8");

$codigoEstanteria = $_REQUEST['codigoEstanteria'];
$numeroLejas = $_REQUEST['numeroLejas'];
$numeroLejasOcupadas = 0;
$letraPasillo = $_REQUEST['letraPasillo'];
$numeroPasillo = $_REQUEST['numeroPasillo'];


$estanteria = new Estanteria($codigoEstanteria, $numeroLejas, $numeroLejasOcupadas, $letraPasillo, $numeroPasillo);

try{
$añadirEstanteria = DAOañadirEstanteria::añadirEstanteria($estanteria);
}catch(insertarEstanteriaException $a){
    header("Location: ../Vistas/vistaErrores.php?id=5&mensaje=$a");exit;
}


$_SESSION['añadirEstanteria'] = $añadirEstanteria;

$id = 1;

$_SESSION['id'] = $id;

header("Location:../Vistas/vistaAñadirEstanteria.php");