<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Exceptions;

/**
 * @author AII (Alexey Ilyin)
 */
class MethodException extends ExceptionBase
{

    public static function forCall($object, $method)
    {
        return new static('method '
            . static::getClass($object)
            . "::$method does not exist or inaccessible");
    }

}
