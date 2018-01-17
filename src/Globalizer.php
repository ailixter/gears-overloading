<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
trait Globalizer
{
    public static function __callStatic ($name, $arguments) {
        if (!is_callable([static::getProxiedObject(), $name])) {
            throw new \RuntimeException('method '
                .get_class(static::getProxiedObject())
                ."::$name does not exist or inaccessible");
        }
        return call_user_func_array([static::getProxiedObject(), $name], $arguments);
    }

    protected static function getProxiedObject () {
        throw new \RuntimeException('proxied object in '
            .get_class().' is not specified');
    }
}
