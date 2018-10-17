<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\AutoGetSetProps;

/**
 * @author AII (Alexey Ilyin)
 */
class TestAutoGetSetStrictProps extends TestStrictProps
{
    use AutoGetSetProps;

    public function getMyPri () {
        return '*' . $this->existingProperty('myPri');
    }
}
