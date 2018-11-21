<?php

namespace L3GSign;


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

    private function setAuth($auth)
    {
        $requiredProperties = ['codigoEmpresa', 'login', 'password', 'idioma', 'date'];

        if (is_array($auth)) $auth = (object) $auth;

        foreach ($requiredProperties as $property)
        {
            if (!property_exists($auth, $property)) throw new InvalidUserDataException;
        }
    }
}
