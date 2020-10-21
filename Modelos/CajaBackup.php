<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CajaBackup
 *
 * @author diego
 */
include_once 'Caja.php';

class CajaBackup extends Caja {

    //Atributos
    private $codigoEstanteria;
    private $numeroLeja;
    private $fechaVenta;

    //Constructor
    public function __construct($codigo, $color, $alto, $profundidad, $ancho, $contenido, $material, $codigoEstanteria, $numeroLeja) {
        parent::__construct($codigo, $color, $alto, $profundidad, $ancho, $contenido, $material);
        $this->codigoEstanteria = $codigoEstanteria;
        $this->numeroLeja = $numeroLeja;
        $this->fechaVenta = date('Y-m-d');
    }

    //Setters
    function setCodigoEstanteria($codigoEstanteria) {
        $this->codigoEstanteria = $codigoEstanteria;
    }

    function setNumeroLeja($numeroLeja) {
        $this->numeroLeja = $numeroLeja;
    }

    function setFechaVenta($fechaVenta) {
        $this->fechaVenta = $fechaVenta;
    }

    //Getters
    function getCodigoEstanteria() {
        return $this->codigoEstanteria;
    }

    function getNumeroLeja() {
        return $this->numeroLeja;
    }

    function getFechaVenta() {
        return $this->fechaVenta;
    }

    public function __toString() {
        
    }

}
