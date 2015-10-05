<?php

class ArraysTest extends PHPUnit_Framework_TestCase
{
    public function testFlatten()
    {
        $this->assertEquals(
            array('a', 'b', 'c', 'd'),
            Missing\Arrays::flatten(array(
                array('a', 'b'),
                'c',
                array(array(array('d'))),
            ))
        );
    }

    public function testSortByInt()
    {
        $this->assertEquals(
            array('a', 'a', 'ab', 'abc', 'abcd'),
            Missing\Arrays::sortBy(
                array('abcd', 'ab', 'a', 'abc', 'a'),
                function ($a) { return strlen($a); }
            )
        );
    }

    public function testSortByString()
    {
        $this->assertEquals(
            array('a333', 'b22', 'c1', 'd55555'),
            Missing\Arrays::sortBy(
                array('d55555', 'b22', 'a333', 'c1'),
                function ($a) { return $a; }
            )
        );
    }

    public function testSortByArray()
    {
        $this->assertEquals(
            array(array(2, 'b'), array(2, 'c'), array(19, 'a')),
            Missing\Arrays::sortBy(
                array(array(19, 'a'), array(2, 'c'), array(2, 'b')),
                function ($a) { return $a; }
            )
        );
    }

    public function testSortByTriggersError()
    {
        $this->setExpectedException('PHPUnit_Framework_Error');
        Missing\Arrays::sortBy(function () {}, array());
    }
}
