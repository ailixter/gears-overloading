<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Helpers\PropsHelpers;
use Ailixter\Gears\Exceptions\PropertyException;

/**
 * Provide getter/setter overriding for properties.
 * @author AII (Alexey Ilyin)
 */
trait Props
{
    use PropsHelpers;

    final public function __get($prop)
    {
        $method = $this->existingMethod('get', $prop);
        return $method ? $this->$method() : $this->propertyGet($prop);
    }

    final public function __set($prop, $value)
    {
        $method = $this->existingMethod('set', $prop);
        $method ? $this->$method($value) : $this->propertySet($prop, $value);
    }

    final public function __isset($prop)
    {
        if (($method = $this->existingMethod('isset', $prop))) {
            return (bool)$this->$method();
        }
        if (($method = $this->existingMethod('get', $prop))) {
            return $this->$method() !== $this->getNullValue();
        }
        return $this->propertyIsSet($prop);
    }

    final public function __unset($prop)
    {
        $method = $this->existingMethod('unset', $prop);
        $method ? $this->$method() : $this->{$prop} = $this->getNullValue();
    }

    /**
     * Default property handler.
     * Override it to provide custom dynamic props.
     * @param scalar $prop
     * @throws PropertyException
     */
    protected function propertyGet($prop)
    {
        throw PropertyException::forGet($this, $prop);
    }

    /**
     * Default property handler.
     * Override it to provide custom dynamic props.
     * @param scalar $prop
     * @param mixed  $value
     * @throws PropertyException
     */
    protected function propertySet($prop, $value)
    {
        throw PropertyException::forSet($this, $prop, $value);
    }

}
