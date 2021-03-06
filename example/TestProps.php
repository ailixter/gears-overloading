<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\Props;

/**
 * Provide getter/setter overriding for properties.
 * @author AII (Alexey Ilyin)
 */
class TestProps
{

    use Props;

    private $myPri = 'my private';
    protected $myPro = 'my protected';
    public $myPub = 'my public';

}
