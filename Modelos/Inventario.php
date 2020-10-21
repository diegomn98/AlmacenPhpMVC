<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Inventario
 *
 * @author diego
 */
class Inventario {
    //todos los atributos
    
    //atributos
    protected $estanterias = Array();//array de estanterias
    //private $fecha;
    
    //Constructor
    public function __construct() {
        //$estanterias = Array();
        //$this->fecha = $fecha;
    }
    
    //Setter
    function setEstanterias($estanterias) {
        $this->estanterias = $estanterias;
    }

//    function setFecha($fecha) {
//        $this->fecha = $fecha;
//    }

    
    //Getter
    function getEstanterias() {
        return $this->estanterias;
    }

//    function getFecha() {
//        return $this->fecha;
//    }

    
    public function __toString() {
        
    }
}
