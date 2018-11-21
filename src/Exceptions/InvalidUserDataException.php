<?php

namespace L3GSign\Exceptions;


class InvalidUserDataException extends \Exception
{

    // CREAR EXCEPCIO GENERICA
    // CREAR FILE EN ARRAY DE LLENGÜES -> EXCEPCIONS -> MISSATGES
    // CREAR FUNCIO A LA EXCEPCIÓ GENÈRICA PER OBTINDRE-HO
    
    public function __construct() {
        // some code

        // make sure everything is assigned properly
        parent::__construct($message);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": {$this->message}\n";
    }

    public function customFunction() {
        echo "A custom function for this type of exception\n";
    }
}
