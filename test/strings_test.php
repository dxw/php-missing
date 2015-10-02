<?php

class StringsTest extends PHPUnit_Framework_TestCase {
  function testStartsWith() {
    $this->assertTrue(Missing\Strings::startsWith('abc', 'a'));
    $this->assertFalse(Missing\Strings::startsWith('abc', 'b'));
    $this->assertFalse(Missing\Strings::startsWith('a', 'abc'));
  }

  function testEndsWith() {
    $this->assertTrue(Missing\Strings::endsWith('abc', 'c'));
    $this->assertFalse(Missing\Strings::endsWith('abc', 'b'));
    $this->assertFalse(Missing\Strings::endsWith('c', 'abc'));
  }

  function testGetOutput() {
    $this->assertEquals('a simple test', Missing\Strings::getOutput(function () {
      echo 'a simple test';
    }));
  }
}
