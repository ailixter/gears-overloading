<?php

/*
 * (C) 2018, AII (Alexey Ilyin).
 */

namespace Ailixter\Gears\Example;

use Ailixter\Gears\BoundProps;

/**
 * @author AII (Alexey Ilyin)
 */
class TestBoundProps
{

    use BoundProps;

    private   $myBoundPri;
    protected $myBoundPro;
    protected $myPro;

    private   $params = [];
    
    public function getDynamic()
    {
        return isset($this->params['dyn']) ? $this->params['dyn'] : null;
    }

    public function setDynamic($value)
    {
        $this->params['dyn'] = $value;
        return $this;
    }
}
