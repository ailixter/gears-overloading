<?php

namespace Ailixter\Gears\Example;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Error\Error;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2018-10-17 at 21:39:54.
 */
class TestAutoGetSetStrictPropsTest extends TestCase
{

    /**
     * @var TestAutoGetSetStrictProps
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestAutoGetSetStrictProps;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    /**
     */
    public function testGetMyPri()
    {
        self::assertEquals('*x', $this->object->setMyPri('x')->getMyPri());
    }

    public function keysProvider()
    {
        return array_map(function ($key) {
            return [$key];
        }, TestAutoGetSetStrictProps::propertyKeys());
    }

    /**
     * @dataProvider keysProvider
     */
    public function testAll($key)
    {
        $this->object->{'set' . ucfirst($key)}('*' . $key);
        self::assertEquals($this->object->$key, $this->object->{'get' . ucfirst($key)}());
    }

}
