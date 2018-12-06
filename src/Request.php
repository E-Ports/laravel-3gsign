<?php

namespace Axsor\L3GSign;

use Artisaninweb\SoapWrapper\Service;
use Artisaninweb\SoapWrapper\SoapWrapper;
use Axsor\L3GSign\Exceptions\InvalidUserDataException;
use Illuminate\Support\Facades\Log;

class Request
{
    private $auth;

    public function __construct()
    {
        $this->soapWrapper = new SoapWrapper();

        $this->soapWrapper->add('L3GSign', function (Service $service) {
            $service->wsdl(config('l3gsign.url'))
                ->trace(true);
        });
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
     * @return Request
     */
    public function authAs($auth)
    {
        $requiredProperties = ['codigoEmpresa', 'login', 'password', 'idioma'
            , 'date'
        ];

        $this->auth = $this->checkReqPropsAndGet($auth, $requiredProperties, InvalidUserDataException::class);

        return $this;
    }

    public function getUsuarios()
    {
        $response = $this->soapWrapper->call('L3GSign.GetUsuarios', (array) $this->auth);

        var_dump($response);
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
}
