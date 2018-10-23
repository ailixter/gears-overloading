<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Exceptions\MethodException;
use RuntimeException;

/**
 * Trait to proxy, adapt and/or decorate.
 * @author AII (Alexey Ilyin)
 */
trait Proxy
{

    use Props;

    final public function __call($name, $arguments)
    {
        if (!is_callable([$this->proxiedObject, $name])) {
            throw MethodException::forCall($this->proxiedObject, $name);
        }
        return call_user_func_array([$this->proxiedObject, $name], $arguments);
    }

    /**
     * Override it if there is no proxiedObject property in hosting class
     * and the proxied object is determined dynamically.
     * @throws RuntimeException
     */
    protected function getProxiedObject()
    {
        throw new RuntimeException('proxied object in '
        . get_class($this) . ' is not specified');
    }

    final protected function propertyGet($name)
    {
        return $this->proxiedObject->{$name};
    }

    final protected function propertySet($name, $value)
    {
        $this->proxiedObject->{$name} = $value;
    }

    protected function existingProperty($prop)
    {
        return property_exists($this->proxiedObject, $prop) ?
            $this->proxiedObject->{$prop} : $this->getNullValue();
    }

}
