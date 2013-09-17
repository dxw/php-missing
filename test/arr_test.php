<?php

class ArrTest extends PHPUnit_Framework_TestCase {
  function testFlatten() {
    $this->assertEquals(
      array('a', 'b', 'c', 'd'),
      Missing\Arr::flatten(array(
        array('a','b'),
        'c',
        array(array(array('d'))),
      ))
    );
  }

  function testSortByInt() {
    $this->assertEquals(
      array('a', 'ab', 'abc', 'abcd'),
      Missing\Arr::sort_by(
        array('abcd', 'ab', 'a', 'abc'),
        function ($a) { return strlen($a); }
      )
    );
  }
}
