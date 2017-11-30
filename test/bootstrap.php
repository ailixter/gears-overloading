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

