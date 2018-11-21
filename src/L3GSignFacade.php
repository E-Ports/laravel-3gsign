<?php

namespace Axsor\L3GSign;

use Illuminate\Support\Facades\Facade;


class L3GSignFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'l3gsign';
    }
}
