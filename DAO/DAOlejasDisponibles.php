<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOlejasDisponibles
 *
 * @author diego
 */

include_once '../BaseDeDatos.php';
include_once '../Modelos/Estanteria.php';

class DAOlejasDisponibles {
    
    public static function mostrarLejasDisponibles($idEstanteria){
        
        global $conexion;
        
        $arrayLejasOcupadas = array();
        
        $lejasOcupadas = "SELECT O.numeroLeja FROM OCUPACION O, ESTANTERIA E WHERE E.id = O.id_estanteria AND E.id = ".$idEstanteria;
                
        $resultado = $conexion->query($lejasOcupadas);
        
        while ($fila = $resultado->fetch_array()){
            
            array_push($arrayLejasOcupadas, $fila['numeroLeja']);
            
        }
        
        
        $capacidad = "SELECT nLejas FROM ESTANTERIA WHERE id = ".$idEstanteria;
        
        $resul = $conexion->query($capacidad);
        
        $fila = $resul->fetch_array();
        
        $arrayLejasLibres = array();
        for($i = 1; $i<=$fila['nLejas'] ;$i++){
            if(!(in_array($i, $arrayLejasOcupadas))){
                array_push($arrayLejasLibres, $i);
            }
        }
        
        return $arrayLejasLibres;
    }
    
}
