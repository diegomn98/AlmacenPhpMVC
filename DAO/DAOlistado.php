<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOlistado
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/CajaConLeja.php';
include_once '../Modelos/EstanteriaConCaja.php';
include_once '../Modelos/Inventario.php';
include_once '../Excepciones/inventarioVacioException.php';

class DAOlistado {

    public static function mostrarListado() {

        global $conexion;

        $consulta = "SELECT * FROM ESTANTERIA ORDER BY letraPasillo, numPasillo";
        $estanterias = $conexion->query($consulta);

        if($conexion->affected_rows < 1){
            throw new inventarioVacioException("El inventario está vacio",4);
        }
        
        $arrayEstanterias = array();

        foreach ($estanterias as $datosEstanteria) {

            $idEstanteria = $datosEstanteria['id'];
            $codigoEstanteria = $datosEstanteria['codigo'];
            $nLejas = $datosEstanteria['nLejas'];
            $lejasOcupadas = $datosEstanteria['nLejasOcupadas'];
            $letraPasillo = $datosEstanteria['letraPasillo'];
            $numPasillo = $datosEstanteria['numPasillo'];

            $arrayCajaconLeja = array();

            $consulta = "SELECT C.*, O.id_caja, O.numeroLeja FROM OCUPACION O, CAJA C WHERE C.id = O.id_caja AND id_estanteria = " . $idEstanteria;

            $cajas = $conexion->query($consulta);

            foreach ($cajas as $datosCaja) {

                $codigoCaja = $datosCaja['codigo'];
                $colorCaja = $datosCaja['color'];
                $alturaCaja = $datosCaja['alto'];
                $profundidadCaja = $datosCaja['profundidad'];
                $anchuraCaja = $datosCaja['ancho'];
                $contenidoCaja = $datosCaja['contenido'];
                $materialCaja = $datosCaja['material'];

                //Datos tabla Ocupacion
                $numeroLejaCaja = $datosCaja['numeroLeja'];

                $cajaConLeja = new CajaConLeja($codigoCaja, $colorCaja, $alturaCaja, $profundidadCaja, $anchuraCaja, $contenidoCaja, $materialCaja, $numeroLejaCaja);

                $arrayCajaconLeja[] = $cajaConLeja;
            }

            $estanteriaConCaja = new EstanteriaConCaja($codigoEstanteria, $nLejas, $lejasOcupadas, $letraPasillo, $numPasillo, $arrayCajaconLeja);

            $arrayEstanterias[] = $estanteriaConCaja;
        }


        $inventario = new Inventario();

        $inventario->setEstanterias($arrayEstanterias);
        
        

        return $inventario;
    }

}
