<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
abstract class AbstractGlobalizer
{

    use Globalizer;

    private static $proxiedObject;

    public static function getProxiedObject()
    {
        return self::$proxiedObject ? self::$proxiedObject :
            self::$proxiedObject = static::createProxiedObject();
    }

    /**
     *
     * @throws \RuntimeException
     * @todo make abstract for PHP7
     */
    protected static function createProxiedObject()
    {
        throw new \RuntimeException(__METHOD__ . ' must be overridden');
    }

}
