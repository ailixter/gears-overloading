<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */
namespace Ailixter\Gears\Overloading;
/**
 * @author AII (Alexey Ilyin)
 */
abstract class AbstractProxy
{
    use Proxy;

    private $proxiedObject;

    public function __construct ($proxiedObject) {
        $this->proxiedObject = $proxiedObject;
    }

    protected function getProxiedObject () {
        return $this->proxiedObject;
    }
}
