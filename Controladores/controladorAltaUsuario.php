<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../DAO/DAOaltaUsuario.php';

session_start();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$usuario = new Usuario($username, $password);

try{
$nuevoUsuario = DAOaltaUsuario::nuevoUsuario($usuario);
}catch(usuarioExistenteException $error){
    header("Location: ../Vistas/vistaErroresLogin.php?id=13&mensaje=$error");exit;
}catch(errorEnElRegistroException $error){
    header("Location: ../Vistas/vistaErroresLogin.php?id=14&mensaje=$error");exit;
} catch (usuarioCompletoException $error){
    header("Location: ../Vistas/vistaErroresLogin.php?id=16&mensaje=$error");exit;
}

$_SESSION['nuevoUsuario'] = $nuevoUsuario;

header("Location: ../Vistas/vistaUsuarioRegistrado.php?id=1&username=$username&password=$password");



