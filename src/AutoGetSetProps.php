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
            return;
        }
        switch ($m[1]) {
            case 'get':
                return method_exists($this, $name) ?
                    $this->$name() : $this->{lcfirst($m[2])};
            case 'set':
                method_exists($this, $name) ?
                    $this->$name($arguments[0]) : $this->{lcfirst($m[2])} = $arguments[0];
                return $this;
        }
    }
}
