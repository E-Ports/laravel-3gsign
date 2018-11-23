<?php

namespace Axsor\L3GSign;


class L3GSign
{
    private $request;

    public function __construct()
    {
        $this->request = new Request;
    }

    /**
     * Returns new instance of L3GSign with data user defined
     *
     * @param $auth object|array User data to authenticate request
     * @return L3GSign
     * @throws Exceptions\InvalidUserDataException
     */
    public static function authAs($auth)
    {
        return (new L3GSign)->setAuth($auth);
    }

    /**
     * Sets user data of the request
     *
     * @param $auth
     * @return $this
     * @throws Exceptions\InvalidUserDataException
     */
    public function setAuth($auth)
    {
        $this->request->authAs($auth);

        return $this;
    }

    public function getUsuarios()
    {
        $this->request->getUsuarios();

        return $this;
    }
}
