<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of insertarEstanteriaException
 *
 * @author diego
 */
class insertarEstanteriaException extends Exception{
    public function __construct($message, $code) {
        parent::__construct($message, $code);
    }
    
    public function __toString() {
        return __CLASS__."[".$this->message."]----->[".$this->code."]<br>";
    }
}
