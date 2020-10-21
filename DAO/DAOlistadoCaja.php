<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOlistadoCaja
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/Caja.php';
include_once '../Modelos/Ocupacion.php';
include_once '../Modelos/CajaConLeja.php';
include_once '../Excepciones/inventarioCajaVacioException.php';

class DAOlistadoCaja {

    public static function listadoCaja() {

        global $conexion;

        $consulta = "SELECT C.*,O.numeroLeja FROM CAJA C, OCUPACION O WHERE C.id = O.id_Caja";

        $cajas = $conexion->query($consulta);

        if ($conexion->affected_rows < 1) {
            throw new inventarioCajaVacioException("El inventario de Cajas está vacio", 6);
        }

        $arrayDatosListadoCaja = array();

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

            $arrayDatosListadoCaja[] = $cajaConLeja;
        }

        return $arrayDatosListadoCaja;
    }

}
