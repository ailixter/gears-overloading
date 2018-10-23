<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * Provides getters and fluent setters for properties.
 * @author AII (Alexey Ilyin)
 */
trait AutoGetSetProps
{

    public function __call($name, $arguments)
    {
        if (!preg_match('/^(get|set)(\w+)$/', lcfirst($name), $parts)) {
            throw Exceptions\MethodException::forCall($this, $name);
        }
        switch ($parts[1]) {
            case 'get':
                if (method_exists($this, $name)) {
                    $result = call_user_func_array([$this, $name], $arguments);
                } else {
                    $result = $this->{lcfirst($parts[2])};
                }
                return $result;
            case 'set':
                if (method_exists($this, $name)) {
                    call_user_func_array([$this, $name], $arguments);
                } else {
                    $this->{lcfirst($parts[2])} = $arguments[0];
                }
                return $this;
        }
    }

}
