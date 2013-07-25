<?php

class DateTest extends PHPUnit_Framework_TestCase {
  function testParseStrptime() {
    $this->assertEquals(1339009200, Missing\Date::parse_strptime(array(
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

  function testParse() {
    $this->assertEquals(1339009200, Missing\Date::parse('2012-06-06T19:00'));
    $this->assertEquals(1339009200, Missing\Date::parse('2012-06-06 19:00'));

    $this->assertEquals('2011-12-13', strftime('%Y-%m-%d', Missing\Date::parse('2011-12-13')));
    $this->assertEquals(mktime(0, 0, 0, 12, 13, 2011), Missing\Date::parse('2011-12-13'));
  }

  function testParseFailureA() {
    $this->setExpectedException('InvalidArgumentException');
    Missing\Date::parse('2012-06-006 19:00');
  }

  function testParseFailureB() {
    $this->setExpectedException('InvalidArgumentException');
    Missing\Date::parse("this doesn't even look like a date!");
  }
}
