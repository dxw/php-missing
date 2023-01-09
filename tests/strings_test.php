<?php declare(strict_types=1);

class StringsTest extends \PHPUnit\Framework\TestCase
{
    public function testStartsWith():void
    {
        $this->assertTrue(Missing\Strings::startsWith('abc', 'a'));
        $this->assertFalse(Missing\Strings::startsWith('abc', 'b'));
        $this->assertFalse(Missing\Strings::startsWith('a', 'abc'));
    }

    public function testEndsWith():void
    {
        $this->assertTrue(Missing\Strings::endsWith('abc', 'c'));
        $this->assertFalse(Missing\Strings::endsWith('abc', 'b'));
        $this->assertFalse(Missing\Strings::endsWith('c', 'abc'));
    }

    public function testGetOutput():void
    {
        $this->assertEquals('a simple test', Missing\Strings::getOutput(function ():void {
            echo 'a simple test';
        }));
    }
}
