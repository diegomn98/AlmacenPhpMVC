<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author diego
 */
class Usuario {
    
    //Atributos
    private $id;
    private $username;
    private $password;
    
    //Constructor
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }
    
    //Setter
    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    //Getters
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }
    
    public function __toString() {
        
    }

 


    
}
