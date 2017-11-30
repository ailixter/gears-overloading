<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */
namespace Ailixter\Gears\Example;
/**
 * TestProxy - .
 *
 * @author AII (Alexey Ilyin)
 */
class TestProxy extends \Ailixter\Gears\Overloading\AbstractProxy
{
    private     $myPri = 'my private';
    protected   $myPro = 'my protected';
    public      $myPub = 'my public';

    protected function protectedMy () {
        return $this->myPro;
    }
    public function publicMy () {
        return $this->myPub;
    }
}
