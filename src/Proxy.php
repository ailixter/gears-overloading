<?php

/*
 * (C) 2017, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Overloading;

/**
 * Proxy - trait to proxy, adapt and decorate.
 *
 * @author AII (Alexey Ilyin)
 */
trait Proxy
{
    use Props;

    final public function __call ($name, $arguments) {
        if (!is_callable([$this->proxiedObject, $name])) {
            throw new \RuntimeException('method '
                .get_class($this->proxiedObject)
                ."::$name does not exist or inaccessible");
        }
        return call_user_func_array([$this->proxiedObject, $name], $arguments);
    }

    /**
     * Override it if there is no proxiedObject property in hosting class
     * and the proxied object is determined dynamically.
     * @throws \RuntimeException
     */
    protected function getProxiedObject () {
        throw new \RuntimeException('proxied object in '
            .get_class($this).' is not specified');
    }

    final protected function propertyGet ($name) {
        return $this->proxiedObject->{$name};
    }

    final protected function propertySet ($name, $value) {
        $this->proxiedObject->{$name} = $value;
    }
}
