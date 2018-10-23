<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

use Ailixter\Gears\Exceptions\MethodException;

/**
 * Provides access to proxied object methods/properties globally (a facade).
 * @author AII (Alexey Ilyin)
 */
trait Globalizer
{

    final public static function __callStatic($name, $arguments)
    {
        if (!is_callable([static::getProxiedObject(), $name])) {
            throw MethodException::forCall(static::getProxiedObject(), $name);
        }
        return call_user_func_array([static::getProxiedObject(), $name], $arguments);
    }

    /**
     * @staticvar mixed $object
     * @return mixed
     */
    protected static function getProxiedObject()
    {
        static $object;
        return $object ? $object : $object = static::createProxiedObject();
    }

    /**
     * @todo make abstract when in PHP7
     * @throws \RuntimeException
     */
    protected static function createProxiedObject () {
        throw new \RuntimeException(__METHOD__.' must be overridden');
    }

    public static function propertyGet($key)
    {
        return static::getProxiedObject()->{$key};
    }
}
