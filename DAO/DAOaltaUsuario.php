<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DAOaltaUsuario
 *
 * @author diego
 */
include_once '../BaseDeDatos.php';
include_once '../Modelos/Usuario.php';
include_once '../Excepciones/usuarioExistenteException.php';
include_once '../Excepciones/errorEnElRegistroException.php';
include_once '../Excepciones/usuarioCompletoException.php';

class DAOaltaUsuario {

    public static function nuevoUsuario($usuario) {

        global $conexion;

        $username = $usuario->getUsername();
        $password = $usuario->getPassword();
        
        $encriptada = password_hash($password, PASSWORD_BCRYPT);

        $consulta = "SELECT nombreUsuario FROM usuario";

        $resultado = $conexion->query($consulta);

        foreach ($resultado as $usuarios) {
            $nombreUsuario = $usuarios['nombreUsuario'];
        }
        if (empty($nombreUsuario)) {

            $insertarUsuario = $conexion->prepare("INSERT INTO usuario VALUES (null,?,?)");
            
            $insertarUsuario->bind_param("ss",$username,$encriptada);
            
            $insertarUsuario->execute();
            
        }else{
            if ($username == $nombreUsuario) {
                throw new usuarioExistenteException("El usuario ya existe", 13);
            } else {
                
                throw new usuarioCompletoException("Solo puede haber un usuario",16);
                
            }
        }
        if($conexion->affected_rows < 1){
            throw new errorEnElRegistroException("Ha habido un error al registrar",14);
        }

        return $conexion->affected_rows;
    }

}
