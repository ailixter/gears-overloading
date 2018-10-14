<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
trait StrictProps
{
    use Props;
    
    protected function propertyGet ($prop) {
        if (!\property_exists($this, $prop)) {
            throw new \RuntimeException(\get_class($this)
                ." has no property '$prop' to read from");
        }
        return $this->{$prop};
    }

    protected function propertySet ($prop, $value) {
        if (!\property_exists($this, $prop)) {
            throw new \RuntimeException(\get_class($this)
                ." has no property '$prop' to write ".gettype($value)." into");
        }
        $this->{$prop} = $value;
        return $this;
    }

    /**
     * @staticvar type $keys
     * @return array
     */
    final public static function propertyKeys () {
        static $keys;
        return $keys ? $keys : $keys = \array_keys(\get_class_vars(\get_class()));
    }
}
