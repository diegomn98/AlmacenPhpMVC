<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOañadirCajaAestanteria
 *
 * @author diego
 */

include_once '../Modelos/Ocupacion.php';
include_once '../BaseDeDatos.php';
include_once '../Excepciones/añadirCajaAestanteriaException.php';
include_once '../Excepciones/actualizarEstanteriaExcepcion.php';

class DAOañadirCajaAestanteria {
    
    public static function ocuparEstanteria($ocupar){
        
        global $conexion;
        
        $idCaja = $ocupar->getId_Caja();
        $idEstanteria = $ocupar->getId_Estanteria();
        $lejaOcupada = $ocupar->getNumeroLeja();
        
        $añadir = $conexion->prepare("INSERT INTO ocupacion VALUES (null,?,?,?)");
        
        $añadir->bind_param("iii",$idCaja,$idEstanteria,$lejaOcupada);
        
        $añadir->execute();
        
       
        
        if($conexion->affected_rows < 1){
           // throw new añadirCajaAestanteriaException("Error al intentar añadir Caja en la estanteria",2);
            throw new añadirCajaAestanteriaException($conexion->error,2);
        }
        
        return $conexion->affected_rows;
        
    }
    
    public static function actualizarEstanteria($idEstanteria){
        
        global $conexion;
        
        $actualizar = "UPDATE estanteria SET nLejasOcupadas = nLejasOcupadas + 1 WHERE id = $idEstanteria";
        
        $conexion->query($actualizar);
        
        if($conexion->affected_rows < 1){
            throw new actualizarEstanteriaExcepcion("Error al actualizar la Estanteria",3);
        }
        
        return $conexion->affected_rows;
    }
    
}
