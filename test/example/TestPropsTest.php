<?php

namespace Ailixter\Gears\Example;

/**
 * Generated by PHPUnit_SkeletonGenerator.
 */
class TestPropsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TestProps
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestProps;
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
    public function test__get()
    {
        self::assertEquals('my public', $this->object->myPub);
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__get_private()
    {
        return($this->object->myPri);
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__get_unknown()
    {
        return($this->object->unknown);
    }

    /**
     */
    public function test__set()
    {
        $this->object->myPub = 123;
        self::assertEquals(123, $this->object->myPub);
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__set_private()
    {
        $this->object->myPri = 123;
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__set_unknown()
    {
        $this->object->unknown = 123;
    }

    /**
     */
    public function test__isset_unknown()
    {
        self::assertFalse(isset($this->object->unknown));
    }

    /**
     */
    public function test__isset_pub()
    {
        self::assertTrue(isset($this->object->myPub));
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     * SIC! unset removes accessible property
     */
    public function test__unset_pub()
    {
        unset($this->object->myPub);
        self::assertFalse(isset($this->object->myPub));
    }

    /**
     */
    public function test__isset_pri()
    {
        self::assertTrue(isset($this->object->myPri));
    }

    /**
     */
    public function test__unset_pri()
    {
        unset($this->object->myPri);
        self::assertFalse(isset($this->object->myPri));
    }

}
