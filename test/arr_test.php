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
      array('a', 'a', 'ab', 'abc', 'abcd'),
      Missing\Arr::sort_by(
        array('abcd', 'ab', 'a', 'abc', 'a'),
        function ($a) { return strlen($a); }
      )
    );
  }

  function testSortByString() {
    $this->assertEquals(
      array('a333', 'b22', 'c1', 'd55555'),
      Missing\Arr::sort_by(
        array('d55555', 'b22', 'a333', 'c1'),
        function ($a) { return $a; }
      )
    );
  }

  function testSortByTriggersError() {
    $this->setExpectedException('PHPUnit_Framework_Error');
    Missing\Arr::sort_by(function(){}, array());
  }
}
