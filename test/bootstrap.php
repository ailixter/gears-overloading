<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

/**
 * @author AII (Alexey Ilyin)
 */
//ini_set('include_path', ini_get('include_path'));
//ini_set('include_path', __DIR__ . '/');

require __dir__.'/../vendor/autoload.php';

class TestClass
{
    private     $pri  = 'private';
    protected   $pro  = 'protected';
    public      $pub  = 'public';

    private function privateFn () {
        return $this->pri;
    }
    protected function protectedFn () {
        return $this->pro;
    }
    public function publicFn () {
        return $this->pub;
    }
    public function returnParam ($param) {
        return $param;
    }
}

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