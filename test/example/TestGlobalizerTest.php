<?php

namespace Ailixter\Gears\Example;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-11-30 at 19:07:56.
 */
class TestGlobalizerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TestGlobalizer
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {

    }

    public function testPublicFn()
    {
        self::assertEquals('public', TestGlobalizer::publicFn());
    }

    /**
     */
    public function testPublicProp()
    {
        self::assertEquals('public', TestGlobalizer::propertyGet('pub'));
    }

    /**
     * @expectedException Ailixter\Gears\Exceptions\MethodException
     */
    public function testProtectedFn()
    {
        TestGlobalizer::protectedFn();
    }
}
