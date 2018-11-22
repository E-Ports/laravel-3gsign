<?php

namespace Axsor\L3GSign;


use Artisaninweb\SoapWrapper\SoapWrapper;
use Axsor\L3GSign\Exceptions\InvalidUserDataException;

class Request
{
    private $auth;

    public function __construct()
    {
        $this->soapWrapper = new SoapWrapper();
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
    public function authAs($auth)
    {
        $requiredProperties = ['codigoEmpresa', 'login', 'password', 'idioma', 'date'];
//
//        if (is_array($auth)) $auth = (object) $auth;
//
//        foreach ($requiredProperties as $property)
//        {
//            if (!property_exists($auth, $property)) throw new InvalidUserDataException;
//        }

        $this->auth = $this->checkReqPropsAndGet($auth, $requiredProperties, InvalidUserDataException::class);
    }

    /**
     * Check if object/array has required props and return object.
     * If not dispatch exception
     *
     * @param $props
     * @param $reqProps
     * @param $exception
     * @return object
     */
    private function checkReqPropsAndGet($props, $reqProps, $exception)
    {
        if (is_array($props)) $props = (object) $props;

        foreach ($reqProps as $property)
        {
            if (!property_exists($props, $property)) throw new $exception;
        }

        return $props;
    }

    public function getUsuarios()
    {
        $requiredProperties = []
    }
}
