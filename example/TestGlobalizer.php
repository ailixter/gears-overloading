<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

/**
 * TestGlobalizer - .
 *
 * @author AII (Alexey Ilyin)
 */
class TestGlobalizer extends \Ailixter\Gears\Overloading\AbstractGlobalizer
{
    public static function getProxiedObject () {
        return self::$proxiedObject ? 
            self::$proxiedObject :
            self::$proxiedObject = new \TestClass;
    }
}
