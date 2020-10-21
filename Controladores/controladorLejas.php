<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../DAO/DAOlejasDisponibles.php';

$destino = $_REQUEST['destino'];

$lejasDisponibles = DAOlejasDisponibles::mostrarLejasDisponibles($destino);


foreach ($lejasDisponibles as $contenido) {
    ?><option value="<?php echo $contenido ?>"
            ><?php echo "Leja Nº: ".$contenido?></option> <?php
}


