<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOañadirCaja
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/Caja.php';
include_once '../Modelos/Estanteria.php';
include_once '../Excepciones/insertarCajaException.php';
include_once '../Excepciones/codigoDuplicadoBackupException.php';

class DAOañadirCaja {

    public static function añadirCaja($caja) {

        global $conexion;

        $codigo = $caja->getCodigo();
        $color = $caja->getColor();
        $altura = $caja->getAlto();
        $profundidad = $caja->getProfundidad();
        $anchura = $caja->getAncho();
        $contenido = $caja->getContenido();
        $material = $caja->getMaterial();
        $fechaAlta = $caja->getFechaAlta();

        //Comparar nueva caja con cajabackup
        $consultaBackup = "SELECT codigoCaja FROM caja_backup";

        $resultado = $conexion->query($consultaBackup);

        foreach ($resultado as $backup) {
            $codigoBackup = $backup['codigoCaja'];
        }

        if ($codigo == $codigoBackup) {
            throw new codigoDuplicadoBackupException("El código ya existe en la tabla Backup",12);
        } else {

            $insertarCaja = $conexion->prepare("INSERT INTO caja VALUES (null,?,?,?,?,?,?,?,?)");
            
            $insertarCaja->bind_param("ssiiisss",$codigo,$color,$altura,$profundidad,$anchura,$contenido,$material,$fechaAlta);
           
            $insertarCaja->execute();

            if ($conexion->affected_rows < 1) {
                throw new insertarCajaException("Error al añadir la Caja", 1);
            }


            return $conexion->affected_rows;
        }
    }

    public static function estanteriasDisponibles() {

        global $conexion;

        $arrayDisponibles = array();

        $estanteriaDisponible = "SELECT * FROM estanteria WHERE nLejas > nLejasOcupadas";

        $resultado = $conexion->query($estanteriaDisponible);



        while ($fila = $resultado->fetch_array()) {

            $estanterias = new Estanteria($fila['codigo'], $fila['nLejas'], $fila['nLejasOcupadas'], $fila['letraPasillo'], $fila['numPasillo']);

            $estanterias->setId($fila['id']);

            array_push($arrayDisponibles, $estanterias);
        }



        return $arrayDisponibles;
    }

}
