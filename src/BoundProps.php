<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
trait BoundProps
{

    public function __get($prop)
    {
        $currentValue = $this->{$prop};
        return $currentValue instanceof BoundPropsInterface ?
            $currentValue->getBoundValue($this, $prop) : $currentValue;
    }

//    public function __isset($prop)
//    {
//        $currentValue = $this->{$prop};
//        return $currentValue instanceof Binding ?
//            $currentValue->getBoundValue($this, $prop) : $currentValue;
//    }

    public function __set($prop, $value)
    {
        if ($value instanceof BoundPropsInterface) {
            $this->{$prop} = $value;
            return;
        }
        $currentValue = $this->{$prop};
        $currentValue instanceof BoundPropsInterface ?
                $currentValue->setBoundValue($this, $prop, $value) :
                $this->{$prop} = $value;
    }

}
