<?php

class IntTest extends PHPUnit_Framework_TestCase {
  function testOrdinalize() {
    $this->assertEquals(Missing\Int::ordinalize(1), '1st');
    $this->assertEquals(Missing\Int::ordinalize(2), '2nd');
    $this->assertEquals(Missing\Int::ordinalize(12), '12th');
    $this->assertEquals(Missing\Int::ordinalize(20), '20th');
    $this->assertEquals(Missing\Int::ordinalize(22), '22nd');
    $this->assertEquals(Missing\Int::ordinalize(23), '23rd');
    $this->assertEquals(Missing\Int::ordinalize('44'), '44th');
    $this->assertEquals(Missing\Int::ordinalize(77), '77th');
  }
}
