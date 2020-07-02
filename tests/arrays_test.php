<?php

class ArraysTest extends \PHPUnit\Framework\TestCase
{
    public function testFlatten()
    {
        $this->assertEquals(
            ['a', 'b', 'c', 'd'],
            Missing\Arrays::flatten([
                ['a', 'b'],
                'c',
                [[['d']]],
            ])
        );
    }

    public function testSortByInt()
    {
        $this->assertEquals(
            ['a', 'a', 'ab', 'abc', 'abcd'],
            Missing\Arrays::sortBy(
                ['abcd', 'ab', 'a', 'abc', 'a'],
                function ($a) {
                    return strlen($a);
                }
            )
        );
    }

    public function testSortByString()
    {
        $this->assertEquals(
            ['a333', 'b22', 'c1', 'd55555'],
            Missing\Arrays::sortBy(
                ['d55555', 'b22', 'a333', 'c1'],
                function ($a) {
                    return $a;
                }
            )
        );
    }

    public function testSortByArray()
    {
        $this->assertEquals(
            [[2, 'b'], [2, 'c'], [19, 'a']],
            Missing\Arrays::sortBy(
                [[19, 'a'], [2, 'c'], [2, 'b']],
                function ($a) {
                    return $a;
                }
            )
        );
    }

    public function testSortByTriggersError()
    {
        $this->expectException(\PHPUnit\Framework\Error\Error::class);
        Missing\Arrays::sortBy(function () {
        }, []);
    }
}
