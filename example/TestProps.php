<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */
namespace Ailixter\Gears\Example;
/**
 * TestProps - .
 *
 * @author AII (Alexey Ilyin)
 */
class TestProps
{
    use \Ailixter\Gears\Overloading\Props;

    private     $myPri = 'my private';
    protected   $myPro = 'my protected';
    public      $myPub = 'my public';
}
