<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Helpers;

/**
 * @author AII (Alexey Ilyin)
 */
trait PropsHelpers
{

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
