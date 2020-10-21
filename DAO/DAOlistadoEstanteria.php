<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOlistadoEstanteria
 *
 * @author diego
 */

include_once '../BaseDeDatos.php';
include_once '../Excepciones/inventarioEstanteriaVaciaException.php';
include_once '../Modelos/Estanteria.php';

class DAOlistadoEstanteria {
    
    public static function listadoEstanteria(){
        
        global $conexion;
        
        $consulta = "SELECT * FROM ESTANTERIA";
        
        $estanterias = $conexion->query($consulta);
        
        if ($conexion->affected_rows < 1) {
            throw new inventarioEstanteriaVaciaException("El inventario de Estanterias está vacio", 7);
        }
        
        $arrayDatosListadoEstanterias = array();
        
        foreach ($estanterias as $datos){
           
            $codigoEstanteria = $datos['codigo'];
            $nLejas = $datos['nLejas'];
            $lejasOcupadas = $datos['nLejasOcupadas'];
            $letraPasillo = $datos['letraPasillo'];
            $numPasillo = $datos['numPasillo'];
            
            $estanteria = new Estanteria($codigoEstanteria, $nLejas, $lejasOcupadas, $letraPasillo, $numPasillo);
            
            $arrayDatosListadoEstanterias[] = $estanteria;
            
        }
        
        return $arrayDatosListadoEstanterias;
        
    }
    
}
