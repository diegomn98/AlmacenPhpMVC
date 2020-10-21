<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOventaCaja
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/Caja.php';
include_once '../Excepciones/cajaNoEncontradaException.php';
include_once '../Excepciones/ventaIncorrectaException.php';
class DAOventaCaja {
    
    public static function seleccionarCaja($codigoCaja){
        
        global $conexion;
        
        $consulta = "SELECT * FROM CAJA WHERE codigo = '".$codigoCaja."'";
        
        $resultado = $conexion->query($consulta);
        
        if($conexion->affected_rows < 1){
            throw new cajaNoEncontradaException("No se ha encontrado la Caja en la Base de Datos",8);
        }
        
        foreach ($resultado as $caja){
            $colorCaja = $caja['color'];
            $alturaCaja = $caja['alto'];
            $profundidadCaja = $caja['profundidad'];
            $anchuraCaja = $caja['ancho'];
            $contenidoCaja = $caja['contenido'];
            $materialCaja = $caja['material'];
            
            $datosCaja = new Caja($codigoCaja, $colorCaja, $alturaCaja, $profundidadCaja, $anchuraCaja, $contenidoCaja, $materialCaja);
            
        }
        
        return $datosCaja;
        
    }
    
    public static function venderCaja($codigoVenta){
        
        global $conexion;
        
        $consulta = "DELETE FROM CAJA WHERE codigo = '".$codigoVenta."'";
        
        $conexion->query($consulta);
        
        if($conexion->affected_rows < 1){
            throw new ventaIncorrectaException("La venta ha sido incorrecta",9);
        }
        
        return $conexion->affected_rows;
        
    }
    
}
