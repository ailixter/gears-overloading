<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\Overloading\AbstractGlobalizer;

/**
 * @author AII (Alexey Ilyin)
 */
class TestGlobalizer extends AbstractGlobalizer
{
    public static function createProxiedObject () {
        return new \TestClass;
    }
}
