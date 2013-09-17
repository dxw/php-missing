<?php

class ArrayTest extends PHPUnit_Framework_TestCase {
  function testFlatten() {
    $this->assertEquals(
      array('a', 'b', 'c', 'd'),
      Missing\_Array::flatten(array(
        array('a','b'),
        'c',
        array(array(array('d'))),
      ))
    );
  }

  function testSortByInt() {
    $this->assertEquals(
      array('a', 'ab', 'abc', 'abcd'),
      Missing\_Array::sort_by(
        array('abcd', 'ab', 'a', 'abc'),
        function ($a) { return strlen($a); }
      )
    );
  }
}
