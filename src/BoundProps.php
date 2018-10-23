<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Helpers\PropsHelpers;

/**
 * Binds properties using {@link BoundPropsInterface}.
 * @author AII (Alexey Ilyin)
 */
trait BoundProps
{

    use PropsHelpers;

    final public function __get($prop)
    {
        $method = $this->existingMethod('get', $prop);
        $currentValue = $method ? $this->$method() : $this->{$prop};
        return $currentValue instanceof BoundPropsInterface ?
            $currentValue->getBoundValue($this, $prop) : $currentValue;
    }

    final public function __isset($prop)
    {
        return $this->__get($prop) !== $this->getNullValue();
    }

    final public function __unset($prop)
    {
        return $this->__set($prop, $this->getNullValue());
    }

    final public function __set($prop, $value)
    {
        if ($value instanceof BoundPropsInterface) {
            $method = $this->existingMethod('set', $prop);
            $method ? $this->$method($value) : $this->{$prop} = $value;
            return;
        }
        $method = $this->existingMethod('get', $prop);
        $currentValue = $method ? $this->$method() : $this->{$prop};
        $currentValue instanceof BoundPropsInterface ?
                $currentValue->setBoundValue($this, $prop, $value) :
                $this->{$prop} = $value;
    }

    /**
     * @param scalar $prop
     * @return mixed
     */
    public function unbind($prop)
    {
        $method = $this->existingMethod('get', $prop);
        $currentValue = $method ? $this->$method() : $this->{$prop};
        if ($currentValue instanceof BoundPropsInterface) {
            $this->{$prop} = $currentValue->getBoundValue($this, $prop);
        }
        return $currentValue;
    }
}
