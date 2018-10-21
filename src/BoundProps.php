<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Helpers\PropsHelpers;

/**
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

//    public function __isset($prop)
//    {
//        $currentValue = $this->{$prop};
//        return $currentValue instanceof Binding ?
//            $currentValue->getBoundValue($this, $prop) : $currentValue;
//    }

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

}
