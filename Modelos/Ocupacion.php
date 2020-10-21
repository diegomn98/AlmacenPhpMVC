<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ocupacion
 *
 * @author diego
 */
class Ocupacion {
    
    //Atributos
    private $id;
    private $id_caja;
    private $id_estanteria;
    private $numeroLeja;
    
    function __construct($id_caja, $id_estanteria, $numeroLeja) {
        $this->id_caja = $id_caja;
        $this->id_estanteria = $id_estanteria;
        $this->numeroLeja = $numeroLeja;
    }
    
    //SETTERS
    function setId_caja($id_caja) {
        $this->id_caja = $id_caja;
    }

    function setId_estanteria($id_estanteria) {
        $this->id_estanteria = $id_estanteria;
    }

    function setNumeroLeja($numeroLeja) {
        $this->numeroLeja = $numeroLeja;
    }

    //GETTERS
    function getId() {
        return $this->id;
    }

    function getId_caja() {
        return $this->id_caja;
    }

    function getId_estanteria() {
        return $this->id_estanteria;
    }

    function getNumeroLeja() {
        return $this->numeroLeja;
    }

    public function __toString() {
        
   
    }

    
}
