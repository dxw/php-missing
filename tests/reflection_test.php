<?php declare(strict_types=1);

class ReflectionTester
{
    private function returnTruePrivate():bool
    {
        return true;
    }

    public function returnTruePublic():bool
    {
        return true;
    }

    private function returnArgPrivate(int $a):int
    {
        return $a;
    }

    public function returnArgPublic(int $a):int
    {
        return $a;
    }
}

class ReflectionTest extends \PHPUnit\Framework\TestCase
{
    public function testCall():void
    {
        $t = new ReflectionTester();
        $this->assertEquals(\Missing\Reflection::call($t, 'returnTruePublic'), true);
        $this->assertEquals(\Missing\Reflection::call($t, 'returnTruePrivate'), true);

        $this->assertEquals(\Missing\Reflection::call($t, 'returnArgPublic', [6]), 6);
        $this->assertEquals(\Missing\Reflection::call($t, 'returnArgPrivate', [6]), 6);
    }
}
