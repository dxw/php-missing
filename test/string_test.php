<?php

class StringTest extends PHPUnit_Framework_TestCase {
  function testStartsWith() {
    $this->assertTrue(Missing\String::starts_with('abc', 'a'));
    $this->assertFalse(Missing\String::starts_with('abc', 'b'));
    $this->assertFalse(Missing\String::starts_with('a', 'abc'));
  }

  function testEndsWith() {
    $this->assertTrue(Missing\String::ends_with('abc', 'c'));
    $this->assertFalse(Missing\String::ends_with('abc', 'b'));
    $this->assertFalse(Missing\String::ends_with('c', 'abc'));
  }

  function testGetOutput() {
    $this->assertEquals('a simple test', Missing\String::get_output(function () {
      echo 'a simple test';
    }));
  }
}
