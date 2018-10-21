<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\BoundPropsInterface;

/**
 * @author AII (Alexey Ilyin)
 */
class TestPropsBinding implements BoundPropsInterface
{
    private $value;
    private $logFn;

    function __construct($value, callable $logFn = null)
    {
        $this->value = $value;
        $this->logFn = $logFn;
    }

    public function formatValue($object, $prop)
    {
        return sprintf('%s::%s: %s', get_class($object), $prop, $this->value);
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
