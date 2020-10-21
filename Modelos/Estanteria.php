    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estanteria
 *
 * @author diego
 */
class Estanteria {

    //Atributos
    private $id;
    private $codigo;
    private $nLejas;
    private $nLejasOcupadas = 0;
    private $letraPasillo;
    private $numPasillo;

    //Constructor
    function __construct($codigo, $nLejas, $nLejasOcupadas, $letraPasillo, $numPasillo) {
        $this->codigo = $codigo;
        $this->nLejas = $nLejas;
        $this->nLejasOcupadas = $nLejasOcupadas;
        $this->letraPasillo = $letraPasillo;
        $this->numPasillo = $numPasillo;
    }

    //SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNLejas($nLejas) {
        $this->nLejas = $nLejas;
    }

    function setNLejasOcupadas($nLejasOcupadas) {
        $this->nLejasOcupadas = $nLejasOcupadas;
    }

    function setLetraPasillo($letraPasillo) {
        $this->letraPasillo = $letraPasillo;
    }

    function setNumPasillo($numPasillo) {
        $this->numPasillo = $numPasillo;
    }

    //GETTERS
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNLejas() {
        return $this->nLejas;
    }

    function getNLejasOcupadas() {
        return $this->nLejasOcupadas;
    }

    function getLetraPasillo() {
        return $this->letraPasillo;
    }

    function getNumPasillo() {
        return $this->numPasillo;
    }

    //TOSTRING
    public function __toString() {
        $cadena = "";
        $cadena .= "Codigo: " . $this->codigo . "<br>";
        $cadena .= "Número de Lejas: " . $this->nLejas . "<br>";
        $cadena .= "Número de Lejas Ocupadas: " . $this->nLejasOcupadas . "<br>";
        $cadena .= "Localización: " . $this->letraPasillo . "-" . $this->numPasillo . "<br>";
        return $cadena;
    }

}
