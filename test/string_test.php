<?php

class StringTest extends PHPUnit_Framework_TestCase {
  function testStartswith() {
    $this->assertTrue(Missing\String::startswith('abc', 'a'));
    $this->assertFalse(Missing\String::startswith('abc', 'b'));
    $this->assertFalse(Missing\String::startswith('a', 'abc'));
  }

  function testEndswith() {
    $this->assertTrue(Missing\String::endswith('abc', 'c'));
    $this->assertFalse(Missing\String::endswith('abc', 'b'));
    $this->assertFalse(Missing\String::endswith('c', 'abc'));
  }

  function testGetOutput() {
    $this->assertEquals('a simple test', Missing\String::get_output(function () {
      echo 'a simple test';
    }));
  }
}
