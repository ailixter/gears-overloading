<?php

namespace Ailixter\Gears\Example;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2018-10-21 at 16:41:24.
 */
class TestBoundPropsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TestBoundProps
     */
    protected $object, $priBinding;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new TestBoundProps;
//        $this->object->myBoundPro = new TestPropsBinding($this->history);
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
    public function testUnbound()
    {
        $this->object->myPro = 'string';
        self::assertSame('string', $this->object->myPro);
    }

    /**
     */
    public function testPri1()
    {
        $history = [];
        $binding = new TestPropsBinding('my private', function ($param) use (&$history) {
            $history[] = $param;
        });
        $this->object->myBoundPri = $binding;
        self::assertSame($binding->formatValue($this->object, 'myBoundPri'), $this->object->myBoundPri);
        return [$this->object, $binding, &$history];
    }

    /**
     * @depends testPri1
     */
    public function testPri2(array $arg)
    {
        $object = $arg[0];
        $binding = $arg[1];
        $history =& $arg[2];
        $object->myBoundPri = 123;
        self::assertSame($binding->formatValue($object, 'myBoundPri'), $object->myBoundPri);
        return $history;
    }

    /**
     * @depends testPri2
     */
    public function testPri3(array $history)
    {
        self::assertNotSame([], $history);
    }

    public function testPro()
    {
        $history = [];
        $binding = new TestPropsBinding('my protected', function ($param) use (&$history) {
            $history[] = $param;
        });
        $this->object->myBoundPro = $binding;
        self::assertSame($binding->formatValue($this->object, 'myBoundPro'), $this->object->myBoundPro);
        $this->object->myBoundPro = 123;
        self::assertSame($binding->formatValue($this->object, 'myBoundPro'), $this->object->myBoundPro);
        self::assertNotSame([], $history);
    }

    public function testDynamic()
    {
        $history = [];
        $binding = new TestPropsBinding('dynamic', function ($param) use (&$history) {
            $history[] = $param;
        });
        $this->object->dynamic = $binding;
        self::assertSame($binding->formatValue($this->object, 'dynamic'), $this->object->dynamic);
        $this->object->dynamic = 456;
        self::assertSame($binding->formatValue($this->object, 'dynamic'), $this->object->dynamic);
        self::assertNotSame([], $history);
    }

    public function testUnbind()
    {
        $history = [];
        $binding = new TestPropsBinding('to unbind', function ($param) use (&$history) {
            $history[] = $param;
        });
        $this->object->myBoundPro = $binding;
        self::assertSame($binding->formatValue($this->object, 'myBoundPro'), $this->object->myBoundPro);
        $this->object->unbind('myBoundPro');
        $this->object->myBoundPro = 456;
        self::assertSame(456, $this->object->myBoundPro);
        self::assertSame([], $history);
    }

    public function testIsSet()
    {
        self::assertFalse(isset($this->object->myPro), 'not is set');
        $this->object->myPro = 123;
        self::assertTrue(isset($this->object->myPro), 'is set');
    }

    public function testUnset()
    {
        $this->object->myPro = 123;
        self::assertTrue(isset($this->object->myPro), 'is set');
        unset($this->object->myPro);
        self::assertFalse(isset($this->object->myPro), 'not is set');
    }

    public function testIsSetBound()
    {
        $history = [];
        $binding = new TestPropsBinding($this->object->nullValue, function ($param) use (&$history) {
            $history[] = $param;
        }, false);
        $this->object->myBoundPro = $binding;
        self::assertFalse(isset($this->object->myBoundPro), 'not is set');
        $this->object->myBoundPro = 456;
        self::assertTrue(isset($this->object->myBoundPro), 'is set');
        self::assertNotSame([], $history);
    }

    public function testUnsetBound()
    {
        $history = [];
        $binding = new TestPropsBinding('to unset', function ($param) use (&$history) {
            $history[] = $param;
        }, false);
        $this->object->myBoundPro = $binding;
        self::assertTrue(isset($this->object->myBoundPro), 'is set');
        unset($this->object->myBoundPro);
        self::assertFalse(isset($this->object->myBoundPro), 'not is set');
        self::assertNotSame([], $history);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Notice
     */
    public function testUndefined()
    {
        self::assertEmpty($this->object->x);
    }
}
