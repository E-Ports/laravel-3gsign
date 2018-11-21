<?php

namespace Axsor\L3GSign;


class L3GSign
{
    private $request;

    public function __construct($auth)
    {
        $this->request = new Request($auth);
    }

    /**
     * Returns new instance of L3GSign
     *
     * @param $auth object|array User data to authenticate request
     * @return L3GSign
     */
    public static function auth($auth)
    {
        return new L3GSign($auth);
    }
}
