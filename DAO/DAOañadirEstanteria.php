<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOañadirEstanteria
 *
 * @author diego
 */

include_once '../BaseDeDatos.php';
include_once '../Modelos/Estanteria.php';
include_once '../Excepciones/insertarEstanteriaException.php';

class DAOañadirEstanteria {
    
    public static function añadirEstanteria($estanteria){
        
        global $conexion;
        
        $codigo = $estanteria->getCodigo();
        $numeroLejas = $estanteria->getNLejas();
        $numeroLejasOcupadas = $estanteria->getNLejasOcupadas();
        $letraPasillo = $estanteria->getLetraPasillo();
        $numeroPasillo = $estanteria->getNumPasillo();
        
        //Consulta Preparada
        $insertarEstanteria = $conexion->prepare("INSERT INTO estanteria VALUES (null,?,?,?,?,?)");
        
        $insertarEstanteria->bind_param("siisi",$codigo,$numeroLejas,$numeroLejasOcupadas,$letraPasillo,$numeroPasillo);
      
        $insertarEstanteria->execute();
        
        if($conexion->affected_rows < 1){
            throw new insertarEstanteriaException("Error al añadir la Estanteria",5);
        }
        
        return $conexion->affected_rows;
        
    }
    
}
