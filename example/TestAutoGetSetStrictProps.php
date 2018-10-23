<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AutoGetSetProps;

/**
 * Create getters/setters for all inherited strict props.
 * @method mixed getMyPro()
 * @method $this setMyPro($value)
 * ...
 * @author AII (Alexey Ilyin)
 */
class TestAutoGetSetStrictProps extends TestStrictProps
{

    use AutoGetSetProps;

    public function getMyPri()
    {
        return '*' . $this->existingProperty('myPri');
    }

}
