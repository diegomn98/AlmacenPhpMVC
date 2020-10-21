<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Caja
 *
 * @author diego
 */
class Caja {
    
    //Atributos
    private $id;
    private  $codigo;
    private $color;
    private  $alto;
    private $profundidad;
    private $ancho;
    private $contenido;
    private $material;
    private $fechaAlta;


    //Constructor
    function __construct($codigo, $color, $alto, $profundidad, $ancho, $contenido, $material) {
        $this->codigo = $codigo;
        $this->color = $color;
        $this->alto = $alto;
        $this->profundidad = $profundidad;
        $this->ancho = $ancho;
        $this->contenido = $contenido;
        $this->material = $material;
        $this->fechaAlta = date('Y-m-d');
    }
    
    //SETTERS
    
    
    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setAlto($alto) {
        $this->alto = $alto;
    }

    function setProfundidad($profundidad) {
        $this->profundidad = $profundidad;
    }

    function setAncho($ancho) {
        $this->ancho = $ancho;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setMaterial($material) {
        $this->material = $material;
    }
    
    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }

    

    //GETTERS
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getColor() {
        return $this->color;
    }

    function getAlto() {
        return $this->alto;
    }

    function getProfundidad() {
        return $this->profundidad;
    }

    function getAncho() {
        return $this->ancho;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getMaterial() {
        return $this->material;
    }
    
    function getFechaAlta() {
        return $this->fechaAlta;
    }

    

    //TOSTRING
    public function __toString() {
        $cadena = "";
        $cadena.="Codigo: ".$this->codigo."<br>";
        $cadena.="Color: ".$this->color."<br>";
        $cadena.="Alto: ".$this->alto."<br>";
        $cadena.="Profundidad: ".$this->profundidad."<br>";
        $cadena.="Ancho: ".$this->ancho."<br>";
        $cadena.="Contenido: ".$this->contenido."<br>";
        $cadena.="Material: ".$this->material."<br>";
        return $cadena;
    }

    
}
