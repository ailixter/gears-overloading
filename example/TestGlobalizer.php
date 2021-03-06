<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\Globalizer;

/**
 * Access proxied object methods globally (provide a facade).
 * @author AII (Alexey Ilyin)
 */
class TestGlobalizer
{
    use Globalizer;

    public static function createProxiedObject()
    {
        return new \TestClass;
    }

}
