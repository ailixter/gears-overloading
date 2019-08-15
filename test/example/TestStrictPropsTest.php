<?php

namespace Ailixter\Gears\Example;

use PHPUnit\Framework\TestCase;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2018-10-13 at 23:12:41.
 */
class TestStrictPropsTest extends TestCase
{

    /**
     * @var TestStrictProps
     *
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestStrictProps;
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
    public function testKeys()
    {
        $pkeys = $this->object->propertyKeys();
        foreach (array_keys($this->object->expectedVars()) as $key) {
            self::assertContains($key, $pkeys);
        }
    }

    /**
     */
    public function test__get()
    {
        foreach ($this->object->expectedVars() as $key => $typval) {
            list(, $value) = $typval;
            self::assertEquals($value, $this->object->$key);
        }
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__getNotDefined()
    {
        return $this->object->notdefined;
    }

    /**
     */
    public function test__set()
    {
        foreach ($this->object->expectedVars() as $key => $typval) {
            list($type, $value) = $typval;
            $value .= '*';
            $this->object->$key = $value;
            self::assertEquals($value, $this->object->$key);
            self::assertInternalType($type, $this->object->propertyGetValue($key));
        }
    }

    /**
     * @expectedException \Ailixter\Gears\Exceptions\PropertyException
     */
    public function test__setNotDefined()
    {
        return $this->object->notdefined = true;
    }

    /**
     */
    public function test__isset()
    {
        foreach (array_keys($this->object->expectedVars()) as $key) {
            self::assertTrue(isset($this->object->$key));
            self::assertNotEmpty($this->object->$key);
        }
    }

    /**
     */
    public function test__unset()
    {
        $expected = $this->object->expectedVars();
        $key = 'calcPro';
        unset($this->object->$key);
        self::assertFalse(isset($this->object->$key));
        self::assertEmpty($this->object->$key);
        self::assertInternalType($expected[$key][0], $this->object->propertyGetValue($key));
    }

}
