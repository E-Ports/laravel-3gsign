<?php

namespace L3GSign;

use L3GSign\Request;


class L3GSign
{
    private $request;

    public function __construct($auth)
    {

        $this->request = new Request($auth);




    }
}
