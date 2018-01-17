<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AbstractGlobalizer;

/**
 * @author AII (Alexey Ilyin)
 */
class TestGlobalizer extends AbstractGlobalizer
{
    public static function createProxiedObject () {
        return new \TestClass;
    }
}
