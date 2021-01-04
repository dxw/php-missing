<?php

class DatesTest extends \PHPUnit\Framework\TestCase
{
    public function testParseStrptime()
    {
        $this->assertEquals(1339009200, Missing\Dates::parseStrptime([
            'tm_sec' => 0,
            'tm_min' => 0,
            'tm_hour' => 19,
            'tm_mday' => 6,
            'tm_mon' => 5,
            'tm_year' => 112,
            'tm_wday' => 5,
            'tm_yday' => 187,
            'unparsed' => null,
        ]));
    }

    public function testParse()
    {
        // Without seconds
        $result = Missing\Dates::parse('2012-06-06T19:00');
        $this->assertFalse($result->isErr());
        $this->assertEquals(1339009200, $result->unwrap());

        $result = Missing\Dates::parse('2012-06-06 19:00');
        $this->assertFalse($result->isErr());
        $this->assertEquals(1339009200, $result->unwrap());

        // With seconds
        $result = Missing\Dates::parse('2012-06-06T19:00:13');
        $this->assertFalse($result->isErr());
        $this->assertEquals(1339009213, $result->unwrap());

        $result = Missing\Dates::parse('2012-06-06 19:00:13');
        $this->assertFalse($result->isErr());
        $this->assertEquals(1339009213, $result->unwrap());

        $result = Missing\Dates::parse('2011-12-13');
        $this->assertFalse($result->isErr());
        $this->assertEquals('2011-12-13', strftime('%Y-%m-%d', $result->unwrap()));

        $result = Missing\Dates::parse('2011-12-13');
        $this->assertFalse($result->isErr());
        $this->assertEquals(mktime(0, 0, 0, 12, 13, 2011), $result->unwrap());
    }

    public function testParseFailureA()
    {
        $result = Missing\Dates::parse('2012-06-006 19:00');
        $this->assertTrue($result->isErr());
    }

    public function testParseFailureB()
    {
        $result = Missing\Dates::parse("this doesn't even look like a date!");
        $this->assertTrue($result->isErr());
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
        $result = Missing\Dates::parse(1339009200);
        $this->assertTrue($result->isErr());

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
