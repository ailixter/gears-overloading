<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Exceptions\PropertyException;

/**
 * @author AII (Alexey Ilyin)
 */
trait StrictProps
{

    use Props;

    protected function propertyGet($prop)
    {
        if (!\property_exists($this, $prop)) {
            throw PropertyException::forGet($this, $prop);
        }
        return $this->{$prop};
    }

    protected function propertySet($prop, $value)
    {
        if (!\property_exists($this, $prop)) {
            throw PropertyException::forSet($this, $prop, $value);
        }
        $this->{$prop} = $value;
        return $this;
    }

    /**
     * @staticvar type $keys
     * @return array
     */
    final public static function propertyKeys()
    {
        static $keys;
        return $keys ? $keys : $keys = \array_keys(\get_class_vars(\get_class()));
    }

}
