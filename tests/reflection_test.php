<?php

class ReflectionTester
{
    private function returnTruePrivate()
    {
        return true;
    }

    public function returnTruePublic()
    {
        return true;
    }

    private function returnArgPrivate($a)
    {
        return $a;
    }

    public function returnArgPublic($a)
    {
        return $a;
    }
}

class ReflectionTest extends PHPUnit_Framework_TestCase
{
    public function testCall()
    {
        $t = new ReflectionTester();
        $this->assertEquals(\Missing\Reflection::call($t, 'returnTruePublic'), true);
        $this->assertEquals(\Missing\Reflection::call($t, 'returnTruePrivate'), true);

        $this->assertEquals(\Missing\Reflection::call($t, 'returnArgPublic', [6]), 6);
        $this->assertEquals(\Missing\Reflection::call($t, 'returnArgPrivate', [6]), 6);
    }
}
