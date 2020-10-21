<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaConLeja
 *
 * @author diego
 */

include_once '../Modelos/Caja.php';
class CajaConLeja extends Caja{
    //datos de caja y la leja
    
    //Atributo
    private $lejaOcupada;
    
    //Constructor
    public function __construct($codigo, $color, $alto, $profundidad, $ancho, $contenido, $material, $lejaOcupada) {
        parent::__construct($codigo, $color, $alto, $profundidad, $ancho, $contenido, $material);
        $this->lejaOcupada = $lejaOcupada;
    }
    
    //Setter
    function setLejaOcupada($lejaOcupada) {
        $this->lejaOcupada = $lejaOcupada;
    }


    //Getter
    function getLejaOcupada() {
        return $this->lejaOcupada;
    }

    public function __toString() {
        
    }
    
}
