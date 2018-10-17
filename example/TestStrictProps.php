<?php

/*
 * (C) {YEAR}, AII (Alexey Ilyin).
 */
namespace Ailixter\Gears\Example;

use Ailixter\Gears\StrictProps;

/**
 * @author AII (Alexey Ilyin)
 */
class TestStrictProps
{
    use StrictProps;

    private     $myPri = 'my private';
    protected   $myPro = 'my protected';
    public      $myPub = 'my public';

    private     $calcPri = [123, 456];
    protected   $calcPro = [456, 789];

    public static function expectedVars () {
        return [
            'myPri' => ['string', 'my private'],
            'myPro' => ['string', 'my protected'],
            'myPub' => ['string', 'my public'],
            'calcPri' => ['array', '123,456'],
            'calcPro' => ['array', '456,789'],
        ];
    }

    public function propertyGetValue ($prop) {
        return $this->propertyGet($prop);
    }

    protected function getCalcPri () {
        return join(',', $this->calcPri);
    }
    protected function setCalcPri ($str) {
         $this->calcPri = explode(',', $str);
         return $this;
    }

    protected function getCalcPro () {
        return join(',', $this->calcPro);
    }
    protected function setCalcPro ($str) {
        $this->calcPro = explode(',', $str);
        return $this;
    }
    protected function issetCalcPro () {
        return count($this->calcPro);
    }
    protected function unsetCalcPro () {
        return $this->calcPro = [];
    }
}
