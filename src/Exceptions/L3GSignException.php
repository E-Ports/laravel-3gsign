<?php

namespace Axsor\L3GSign\Exceptions;


class L3GSignException extends \Exception
{
    /**
     * Returns exception message translation
     *
     * TODO traducció del llenguatge obtinguda a través de la configuració
     *
     * @param $class
     * @return mixed
     */
    protected function getTranslatedMessage($class)
    {
        $lang = require_once __DIR__.'/../../resources/lang/es.php';

        return $lang['exceptions'][$class];
    }
}
