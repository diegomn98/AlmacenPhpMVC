<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once './controladorCaja.php';
include_once '../DAO/DAOañadirCajaAestanteria.php';

session_start();

$codigoCaja = $_REQUEST['codigoCaja'];
$colorCaja = $_REQUEST['colorCaja'];
$altura = $_REQUEST['altura'];
$profundidad = $_REQUEST['profundidad'];
$anchura = $_REQUEST['anchura'];
$contenidoCaja = $_REQUEST['contenidoCaja'];
$materialCaja = $_REQUEST['materialCaja'];

$idEstanteria = $_REQUEST['origen'];
$lejaOcupada = $_REQUEST['destino'];


$caja = new Caja($codigoCaja, $colorCaja, $altura, $profundidad, $anchura, $contenidoCaja, $materialCaja);

$conexion->autocommit(false);
$evaluar = true;

try{
$añadirCaja = DAOañadirCaja::añadirCaja($caja);
}catch (insertarCajaException $a){
    header("Location: ../Vistas/vistaErrores.php?id=1&mensaje=$a");exit;
}catch(codigoDuplicadoBackupException $error){
    header("Location: ../Vistas/vistaErrores.php?id=12&mensaje=$error");exit;
}
if($añadirCaja != 1){
    $evaluar = false;
}

$idCaja = $conexion->insert_id;            

$ocupar = new Ocupacion($idCaja, $idEstanteria, $lejaOcupada);

try{
$añadirOcupacion = DAOañadirCajaAestanteria::ocuparEstanteria($ocupar);
}catch(añadirCajaAestanteriaException $b){
    header("Location: ../Vistas/vistaErrores.php?id=2&mensaje=$b");exit;
}
if($añadirOcupacion != 1){
    $evaluar = false;
}

try{
$actualizar = DAOañadirCajaAestanteria::actualizarEstanteria($idEstanteria);
} catch (actualizarEstanteriaExcepcion $c){
    header("Location: ../Vistas/vistaErrores.php?id=3&mensaje=$c");exit;
}

if($actualizar != 1){
    $evaluar = false;
}

if($evaluar == true){
    $conexion->commit();
    $conexion->autocommit(true);
}else{
    $conexion->rollback();
}

$_SESSION['ocupacion'] = $añadirOcupacion;

$_SESSION['añadirCaja'] = $añadirCaja;

$id = 1;

$_SESSION['id'] = $id;

header("Location:../Vistas/vistaAñadirCaja.php");

