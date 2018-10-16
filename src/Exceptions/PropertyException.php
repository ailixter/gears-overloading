<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */
namespace Ailixter\Gears\Exceptions;
/**
 * @author AII (Alexey Ilyin)
 */
class PropertyException extends ExceptionBase
{
    /**
     * @param mixed $object
     * @param string $prop
     * @return PropertyException
     */
    public static function forGet($object, $prop) {
        return new static(static::getClass($object)
            ." has no accessible property '$prop' to read from");
    }
    /**
     * @param mixed $object
     * @param string $prop
     * @param mixed $value
     * @return PropertyException
     */
    public static function forSet($object, $prop, $value) {
        return new static(static::getClass($object)
            ." has no accessible property '$prop' to write "
            .gettype($value). " into");
    }
}
