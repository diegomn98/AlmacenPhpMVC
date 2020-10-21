<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOinicioSesion.php';

session_start();



$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$estado = false;

$usuario = new Usuario($username, $password);
try{
$inicioSesion = DAOinicioSesion::inicioSesion($usuario);
}catch(errorUsuarioException $error){
    header("Location: ../Vistas/vistaErroresLogin.php?id=15&mensaje=$error");exit;
}


if($inicioSesion == true){
    $estado = true;
    $_SESSION['estado'] = $estado;
    header("Location: ../index.php");
}

