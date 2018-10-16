<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Exceptions;

/**
 * @author AII (Alexey Ilyin)
 */
class ExceptionBase extends \RuntimeException
{
    protected static function getClass ($object) {
        return is_object($object) ? get_class($object) : $object;
    }
}
