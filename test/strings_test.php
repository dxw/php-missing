<?php

class StringsTest extends PHPUnit_Framework_TestCase {
  function testStartsWith() {
    $this->assertTrue(Missing\Strings::starts_with('abc', 'a'));
    $this->assertFalse(Missing\Strings::starts_with('abc', 'b'));
    $this->assertFalse(Missing\Strings::starts_with('a', 'abc'));
  }

  function testEndsWith() {
    $this->assertTrue(Missing\Strings::ends_with('abc', 'c'));
    $this->assertFalse(Missing\Strings::ends_with('abc', 'b'));
    $this->assertFalse(Missing\Strings::ends_with('c', 'abc'));
  }

  function testGetOutput() {
    $this->assertEquals('a simple test', Missing\Strings::get_output(function () {
      echo 'a simple test';
    }));
  }
}
