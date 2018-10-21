<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears;

/**
 * @author AII (Alexey Ilyin)
 */
interface BoundPropsInterface
{
    function getBoundValue($object, $prop);
    function setBoundValue($object, $prop, $value);
}
