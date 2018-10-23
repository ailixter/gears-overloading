<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AutoGetSetProps;
use Ailixter\Gears\Props;

/**
 * Just create getters/setters for all defined props.
 * @method mixed getX()
 * @method $this setX($value)
 * @author AII (Alexey Ilyin)
 */
class TestAutoGetSetProps2
{

    use Props, AutoGetSetProps;

    private $x;

    protected function propertyGet($prop)
    {
        return $this->{$prop};
    }

    protected function propertySet($prop, $value)
    {
        $this->{$prop} = $value;
    }
    
    public function getY($default = '???')
    {
        return $this->existingProperty('y', $default);
    }
}
