<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * Use it as a base class for common proxy behavior.
 * @author AII (Alexey Ilyin)
 */
abstract class AbstractProxy
{

    use Proxy;

    private $proxiedObject;

    public function __construct($proxiedObject)
    {
        $this->proxiedObject = $proxiedObject;
    }

    protected function getProxiedObject()
    {
        return $this->proxiedObject;
    }

}
