<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Overloading;

/**
 * AbstractGlobalizer - .
 *
 * @author AII (Alexey Ilyin)
 */
abstract class AbstractGlobalizer
{
    use Globalizer;

    protected static $proxiedObject;

    protected static function getProxiedObject () {
        return self::$proxiedObject;
    }
}
