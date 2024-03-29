<?php

class IntsTest extends \PHPUnit\Framework\TestCase
{
	public function testOrdinalize()
	{
		$this->assertEquals(Missing\Ints::ordinalize(1), '1st');
		$this->assertEquals(Missing\Ints::ordinalize(2), '2nd');
		$this->assertEquals(Missing\Ints::ordinalize(12), '12th');
		$this->assertEquals(Missing\Ints::ordinalize(20), '20th');
		$this->assertEquals(Missing\Ints::ordinalize(22), '22nd');
		$this->assertEquals(Missing\Ints::ordinalize(23), '23rd');
		$this->assertEquals(Missing\Ints::ordinalize('44'), '44th');
		$this->assertEquals(Missing\Ints::ordinalize(77), '77th');
	}

	public function testMonthName()
	{
		$this->assertEquals(Missing\Ints::monthName(1), 'January');
		$this->assertEquals(Missing\Ints::monthName(2), 'February');
		$this->assertEquals(Missing\Ints::monthName(12), 'December');
	}

	public function testMonthNameLessThanThrowsException()
	{
		$this->expectException(\UnexpectedValueException::class);
		Missing\Ints::monthName(0);
	}

	public function testMonthNameGreaterThanThrowsException()
	{
		$this->expectException(\UnexpectedValueException::class);
		Missing\Ints::monthName(13);
	}
}
