<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
trait AutoGetSetProps
{
    public function __call ($name, $arguments) {
        if (!preg_match('/^(get|set)(\w+)$/', $name, $m)) {
            echo "throw new \RuntimeException(call $name)\n";
        }
        switch ($m[1]) {
            case 'get':
                return $this->__get(lcfirst($m[2]));
            case 'set':
                $this->__set(lcfirst($m[2]), $arguments[0]);
                return $this;
        }
    }

    protected function propertyAutoGet ($prop) {
        return method_exists($this, $method = '__get') ?
            $this->$method() : $this->propertyGet($prop);
    }

    protected function propertyAutoSet ($prop, $value) {
        method_exists($this, $method = '__set') ?
            $this->$method() : $this->propertySet($prop, $value);
    }
}
