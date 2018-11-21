<?php

namespace Axsor\L3GSign;


use Axsor\L3GSign\Exceptions\InvalidUserDataException;

class Request
{
    private $auth;

    public function __construct($client)
    {
        $this->setAuth($client);
        /*
         *  <mob:codigoEmpresa>empresaEjemplo</mob:codigoEmpresa>
            <mob:login>wsempresaEjemplo</mob:login>
            <mob:password>EjemploEmpresa</mob:password>
            <mob:idioma>es</mob:idioma>
            <mob:date>m23[…]34</mob:date>
         * */
    }

    /**
     * Sets User Data to Login.
     * Checks if all required properties are in object
     *
     * @param $auth
     * @throws InvalidUserDataException
     */
    private function setAuth($auth)
    {
        $requiredProperties = ['codigoEmpresa', 'login', 'password', 'idioma', 'date'];

        if (is_array($auth)) $auth = (object) $auth;

        foreach ($requiredProperties as $property)
        {
            if (!property_exists($auth, $property)) throw new InvalidUserDataException;
        }

        $this->auth = $auth;
    }
}
