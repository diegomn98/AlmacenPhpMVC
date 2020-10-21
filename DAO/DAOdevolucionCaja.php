<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOdevolucionCaja
 *
 * @author diego
 */

include_once '../BaseDeDatos.php';
include_once '../Modelos/CajaBackup.php';
include_once '../Modelos/Caja.php';
include_once '../Modelos/Estanteria.php';
include_once '../Excepciones/cajaNoEncontradaException.php';
include_once '../Excepciones/devolucionIncorrectaException.php';

class DAOdevolucionCaja {
   
    public static function datosCajaBackup($codigoCajaDevolucion){
        
        global $conexion;
        
        $consulta = "SELECT * FROM caja_backup WHERE codigoCaja = '".$codigoCajaDevolucion."'";
        
        $resultado = $conexion->query($consulta);
        
        if($conexion->affected_rows < 1){
            throw new cajaNoEncontradaException("No se ha encontrado la Caja en la Base de Datos",10);
        }
        
        foreach ($resultado as $cajaBackup){
            
            //Datos propios de Caja incluida FechaAlta
            $codigoBackup = $cajaBackup['codigoCaja'];
            $colorBackup = $cajaBackup['colorCaja'];
            $alturaBackup = $cajaBackup['altoCaja'];
            $profundidadBackup = $cajaBackup['profundidadCaja'];
            $anchuraBackup = $cajaBackup['anchoCaja'];
            $contenidoBackup = $cajaBackup['contenidoCaja'];
            $materialBackup = $cajaBackup['materialCaja'];
            
            //Datos propios de BackUp
            $codigoEstanteriaBackup = $cajaBackup['codigoEstanteria'];
            $numeroLejaBackup = $cajaBackup['codigoEstanteria'];
            //Contiene FechaVenta
            
            $DatosCajaBackup = new CajaBackup($codigoBackup, $colorBackup, $alturaBackup, $profundidadBackup, $anchuraBackup, $contenidoBackup, $materialBackup, $codigoEstanteriaBackup, $numeroLejaBackup);
               
        }
        
        return $DatosCajaBackup; 
        
    }
    
    public static function funcionTrigger($caja){
        
        global $conexion;
        
        $codigoCaja = $caja->getCodigo();
        
        include_once '../Modelos/triggerDevolverCaja.php';
        
        $consulta = "DELETE FROM caja_backup WHERE codigoCaja = '".$codigoCaja."'";
        
        $resultado1 = $conexion->query($consulta);
        
        
        
        if($resultado1 && $resultado2 && $resultado3){
            
        }else{
           throw new devolucionIncorrectaException("Ha habido un error en la devolución",11);
        }
        
        return $conexion->affected_rows;
        
    }
    
}
