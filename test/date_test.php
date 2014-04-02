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
    // Without seconds
    list($date, $err) = Missing\Date::parse('2012-06-06T19:00');
    $this->assertNull($err);
    $this->assertEquals(1339009200, $date);

    list($date, $err) = Missing\Date::parse('2012-06-06 19:00');
    $this->assertNull($err);
    $this->assertEquals(1339009200, $date);

    // With seconds
    list($date, $err) = Missing\Date::parse('2012-06-06T19:00:13');
    $this->assertNull($err);
    $this->assertEquals(1339009213, $date);

    list($date, $err) = Missing\Date::parse('2012-06-06 19:00:13');
    $this->assertNull($err);
    $this->assertEquals(1339009213, $date);

    list($date, $err) = Missing\Date::parse('2011-12-13');
    $this->assertNull($err);
    $this->assertEquals('2011-12-13', strftime('%Y-%m-%d', $date));

    list($date, $err) = Missing\Date::parse('2011-12-13');
    $this->assertNull($err);
    $this->assertEquals(mktime(0, 0, 0, 12, 13, 2011), $date);
  }

  function testParseFailureA() {
    list($date, $err) = Missing\Date::parse('2012-06-006 19:00');
    $this->assertTrue($err);
  }

  function testParseFailureB() {
    list($date, $err) = Missing\Date::parse("this doesn't even look like a date!");
    $this->assertTrue($err);
  }

  function testResettingTimeZone() {
    date_default_timezone_set('America/New_York');
    Missing\Date::parse('2011-12-13');
    $this->assertEquals(date_default_timezone_get(), 'America/New_York');
    // Reset so we don't break other tests
    date_default_timezone_set('UTC');
  }

  function testStrftime() {
    $this->assertEquals(
      \Missing\Date::strftime('2014-01-01 00:00', '%H:%M', 'unknown', 'Europe/London'),
      '00:00'
    );
    $this->assertEquals(
      \Missing\Date::strftime('2014-06-01 00:00', '%H:%M', 'unknown', 'Europe/London'),
      '01:00'
    );
    $this->assertEquals(
      \Missing\Date::strftime('cats', '%H:%M', 1234, 'Europe/London'),
      1234
    );
  }

  function testTimestamp() {
    // It doesn't make sense to parse a timestamp
    list($date, $err) = Missing\Date::parse(1339009200);
    $this->assertTrue($err);
    $this->assertNull($date);

    // But it does make sense to strftime() a timestamp
    $this->assertEquals(
      '2012-06-06T20:00',
      Missing\Date::strftime(
        1339009200,
        '%Y-%m-%dT%H:%M',
        'unknown',
        'Europe/London'
      )
    );
  }
}
