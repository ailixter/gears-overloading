<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\BoundPropsInterface;

/**
 * The binder example for {@link BoundProps}.
 * @author AII (Alexey Ilyin)
 */
class TestPropsBinding implements BoundPropsInterface
{
    private $value;
    private $logFn;
    private $format;

    function __construct($value, callable $logFn = null, $format = true)
    {
        $this->value = $value;
        $this->logFn = $logFn;
        $this->format = $format;
    }

    public function formatValue($object, $prop)
    {
        return $this->format ?
            sprintf('%s::%s: %s', get_class($object), $prop, $this->value) :
            $this->value;
    }

    public function getBoundValue($object, $prop)
    {
        return $this->formatValue($object, $prop);
    }

    public function setBoundValue($object, $prop, $value)
    {
        $this->value = $value;
        $log = $this->logFn
        and $log($this->formatValue($object, $prop));
    }

}
