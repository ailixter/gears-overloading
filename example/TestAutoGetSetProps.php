<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AutoGetSetProps;

/**
 * Just create getters/setters for all defined props.
 * @method mixed getX()
 * @method $this setX($value)
 * @author AII (Alexey Ilyin)
 */
class TestAutoGetSetProps
{

    use AutoGetSetProps;

    private $x;

}
