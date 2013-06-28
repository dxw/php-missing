<?php

class DateTest extends PHPUnit_Framework_TestCase {
  function testAll() {
    $this->assertTrue(1339009200 === parse_strptime(array(
      'tm_sec' => 0,
      'tm_min' => 0,
      'tm_hour' => 19,
      'tm_mday' => 6,
      'tm_mon' => 5,
      'tm_year' => 112,
      'tm_wday' => 5,
      'tm_yday' => 187,
      'unparsed' => null,
    )));
  }
}
