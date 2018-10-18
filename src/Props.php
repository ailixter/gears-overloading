<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Exceptions\PropertyException;

trait Props
{

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
            return $this->$method() !== $this->nullValue;
        }
        return $this->propertyIsSet($prop);
    }

    final public function __unset($prop)
    {
        $method = $this->existingMethod('unset', $prop);
        $method ? $this->$method() : $this->{$prop} = $this->nullValue;
    }

    protected function existingMethod($prefix, $prop)
    {
        $method = "$prefix$prop";
        return method_exists($this, $method) ? $method : false;
    }

    protected function existingProperty($prop)
    {
        return property_exists($this, $prop) ?
            $this->{$prop} : $this->nullValue;
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

    protected function propertyIsSet($prop)
    {
        return $this->existingProperty($prop) !== $this->nullValue;
    }

    /**
     * Default null/unexisting property value.
     * Override it to provide custom dynamic property handling.
     * @return mixed
     */
    protected function getNullValue()
    {
        return null;
    }

}
