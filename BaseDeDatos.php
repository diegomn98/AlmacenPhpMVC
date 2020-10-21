<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */




@ $conexion = new mysqli("localhost", "root", "", "bd_almacen_dmn");


$error = $conexion->connect_error;

if ($error != null) {
    echo "No se ha podido conectar a la base de datos por el siguiente error: $conexion->connect_error";
    exit();
} 