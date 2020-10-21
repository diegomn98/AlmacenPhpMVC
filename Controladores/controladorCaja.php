<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../DAO/DAOañadirCaja.php';
include_once '../Modelos/Estanteria.php';

session_start();

$estanteriasDisponibles = DAOañadirCaja::estanteriasDisponibles();

$_SESSION['estanteriasDisponibles'] = $estanteriasDisponibles;

header("Location:../Vistas/vistaCaja.php");