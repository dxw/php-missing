<?php

class StringTest extends PHPUnit_Framework_TestCase {
  function testAll() {
    $this->assertTrue(startswith('abc', 'a'));
    $this->assertTrue(!startswith('abc', 'b'));
    $this->assertTrue(!startswith('a', 'abc'));

    $this->assertTrue(endswith('abc', 'c'));
    $this->assertTrue(!endswith('abc', 'b'));
    $this->assertTrue(!endswith('c', 'abc'));
  }
}
