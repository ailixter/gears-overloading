<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AbstractProxy;

/**
 * Proxy your objects (or just use {@link Proxy} - {@see AbstractProxy}).
 * @author AII (Alexey Ilyin)
 */
class TestProxy extends AbstractProxy
{

    private $myPri = 'my private';
    protected $myPro = 'my protected';
    public $myPub = 'my public';

    protected function protectedMy()
    {
        return $this->myPro;
    }

    public function publicMy()
    {
        return $this->myPub;
    }

    public function callProtectedMy()
    {
        return $this->protectedMy();
    }
}
