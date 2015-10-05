<?php

class DatesTest extends PHPUnit_Framework_TestCase
{
    public function testParseStrptime()
    {
        $this->assertEquals(1339009200, Missing\Dates::parseStrptime(array(
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

    public function testParse()
    {
        // Without seconds
        list($date, $err) = Missing\Dates::parse('2012-06-06T19:00');
        $this->assertNull($err);
        $this->assertEquals(1339009200, $date);

        list($date, $err) = Missing\Dates::parse('2012-06-06 19:00');
        $this->assertNull($err);
        $this->assertEquals(1339009200, $date);

        // With seconds
        list($date, $err) = Missing\Dates::parse('2012-06-06T19:00:13');
        $this->assertNull($err);
        $this->assertEquals(1339009213, $date);

        list($date, $err) = Missing\Dates::parse('2012-06-06 19:00:13');
        $this->assertNull($err);
        $this->assertEquals(1339009213, $date);

        list($date, $err) = Missing\Dates::parse('2011-12-13');
        $this->assertNull($err);
        $this->assertEquals('2011-12-13', strftime('%Y-%m-%d', $date));

        list($date, $err) = Missing\Dates::parse('2011-12-13');
        $this->assertNull($err);
        $this->assertEquals(mktime(0, 0, 0, 12, 13, 2011), $date);
    }

    public function testParseFailureA()
    {
        list($date, $err) = Missing\Dates::parse('2012-06-006 19:00');
        $this->assertTrue($err);
    }

    public function testParseFailureB()
    {
        list($date, $err) = Missing\Dates::parse("this doesn't even look like a date!");
        $this->assertTrue($err);
    }

    public function testResettingTimeZone()
    {
        date_default_timezone_set('America/New_York');
        Missing\Dates::parse('2011-12-13');
        $this->assertEquals(date_default_timezone_get(), 'America/New_York');
        // Reset so we don't break other tests
        date_default_timezone_set('UTC');
    }

    public function testStrftime()
    {
        $this->assertEquals(
            \Missing\Dates::strftime('2014-01-01 00:00', '%H:%M', 'unknown', 'Europe/London'),
            '00:00'
        );
        $this->assertEquals(
            \Missing\Dates::strftime('2014-06-01 00:00', '%H:%M', 'unknown', 'Europe/London'),
            '01:00'
        );
        $this->assertEquals(
            \Missing\Dates::strftime('cats', '%H:%M', 1234, 'Europe/London'),
            1234
        );
    }

    public function testTimestamp()
    {
        // It doesn't make sense to parse a timestamp
        list($date, $err) = Missing\Dates::parse(1339009200);
        $this->assertTrue($err);
        $this->assertNull($date);

        // But it does make sense to strftime() a timestamp
        $this->assertEquals(
            '2012-06-06T20:00',
            Missing\Dates::strftime(
                1339009200,
                '%Y-%m-%dT%H:%M',
                'unknown',
                'Europe/London'
            )
        );
    }
}
