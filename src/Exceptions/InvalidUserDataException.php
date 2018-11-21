<?php

namespace Axsor\L3GSign\Exceptions;


class InvalidUserDataException extends L3GSignException
{
    public function __construct() {
        parent::__construct($this->getTranslatedMessage(self::class));
    }
}
