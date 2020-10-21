<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOinicioSesion
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/Usuario.php';
include_once '../Excepciones/errorUsuarioException.php';

class DAOinicioSesion {
 
    public static function inicioSesion($usuario){
        
        global $conexion;
      
        $username = $usuario->getUsername();
        $password = $usuario->getPassword();
        
        $consulta = "SELECT * FROM usuario";
        
        $resultado = $conexion->query($consulta);
        
        foreach ($resultado as $datosUsuario){
            $nombreUsuario = $datosUsuario['nombreUsuario'];
            $passwordUsuario = $datosUsuario['passwordUsuario'];
        }
        
        $estado = false;
        
        if($username == $nombreUsuario){
            if(password_verify($password, $passwordUsuario)){
                $estado = true;
            }
        }

        
        if($estado == false){
            throw new errorUsuarioException("Error al introducir datos",15);
        }
        
        return $estado;
    }
    
}
