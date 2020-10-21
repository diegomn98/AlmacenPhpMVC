<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estanteriaConCaja
 *
 * @author diego
 */

include_once 'CajaConLeja.php';
include_once '../Modelos/Estanteria.php';
class estanteriaConCaja extends Estanteria{
    //y contiene el objeto caja dentro
    //array de cajas
    
    //Atributos
    private $cajaConLeja = array();
    
    //Constructor
    public function __construct($codigo, $nLejas, $nLejasOcupadas, $letraPasillo, $numPasillo, $cajaConLeja) {
        parent::__construct($codigo, $nLejas, $nLejasOcupadas, $letraPasillo, $numPasillo);
        $this->cajaConLeja = $cajaConLeja;
    }
    
    //Setter
    function setCajaConLeja($cajaConLeja) {
        $this->cajaConLeja = $cajaConLeja;
    }

    //Getter
    function getCajaConLeja() {
        return $this->cajaConLeja;
    }


    public function __toString() {
        
    }
}
