<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

trait Props
{
    final public function __get ($prop) {
        return method_exists($this, $method = "get$prop") ?
            $this->$method() : $this->propertyGet($prop);
    }

    final public function __set ($prop, $value) {
        method_exists($this, $method = "set$prop") ?
            $this->$method($value) : $this->propertySet($prop, $value);
    }

    /**
     * Default property handler.
     * Override it to provide custom dynamic props.
     * @param scalar $prop
     * @throws \RuntimeException
     */
    protected function propertyGet ($prop) {
        throw new \RuntimeException(get_class($this)
            ." has no property '$prop' to read from");
    }

    /**
     * Default property handler.
     * Override it to provide custom dynamic props.
     * @param scalar $prop
     * @param mixed  $value
     * @throws \RuntimeException
     */
    protected function propertySet ($prop, $value) {
        throw new \RuntimeException(get_class($this)
            ." has no property '$prop' to write ".gettype($value). " into");
    }

    final public function __isset ($prop) {
        return method_exists($this, $method = "isset$prop") ?
            (bool)$this->$method() : $this->{$prop} !== $this->nullValue;
    }

    final public function __unset ($prop) {
        method_exists($this, $method = "unset$prop") ?
            $this->$method() : $this->{$prop} = $this->nullValue;
    }

    /**
     * Default null/unexisting property value.
     * Override it to provide custom dynamic property handling.
     * @return mixed
     * @deprecated
     */
    protected function getNullValue () {
        return null;
    }

}
