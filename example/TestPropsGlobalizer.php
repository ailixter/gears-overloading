<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\Globalizer;

/**
 * Access proxied object properties globally (provide a facade).
 * @author AII (Alexey Ilyin)
 */
class TestPropsGlobalizer
{
    use Globalizer {
        getProxiedObject as public;
    }

    public static function createProxiedObject()
    {
        return new TestStrictProps;
    }

}
