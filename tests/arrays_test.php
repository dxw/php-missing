<?php declare(strict_types=1);

class ArraysTest extends \PHPUnit\Framework\TestCase
{
    public function testFlatten():void
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

    public function testSortByInt():void
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

    public function testSortByString():void
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

    public function testSortByArray():void
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

    public function testSortByTriggersError():void
    {
        $this->expectException(\TypeError::class);
        Missing\Arrays::sortBy(function () :void {
        }, []);
    }
}
