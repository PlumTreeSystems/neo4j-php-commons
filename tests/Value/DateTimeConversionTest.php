<?php


namespace Neo4j\Common\Tests\Value;

use Neo4j\Common\Value\Date;
use Neo4j\Common\Value\DateTimeOffset;
use Neo4j\Common\Value\DateTimeZoned;
use Neo4j\Common\Value\Duration;
use Neo4j\Common\Value\LocalDateTime;
use Neo4j\Common\Value\LocalTime;
use Neo4j\Common\Value\Time;

/**
 * Class DateTimeConversionTest
 * @group unit
 */
class DateTimeConversionTest extends \PHPUnit_Framework_TestCase
{
    public function testDateConversion()
    {
        $dateTime = new \DateTime();
        $date = Date::fromDateTime($dateTime);
        $this->assertNotNull($date);
        $converted = $date->toDateTime();
        $this->assertSame($dateTime->format('Y-m-d'), $converted->format('Y-m-d'));
    }

    public function testDateTimeOffsetConversion()
    {
        date_default_timezone_set('Europe/London');
        $dateTime = new \DateTime('19:20:00', new \DateTimeZone('America/Phoenix'));
        $date = DateTimeOffset::fromDateTime($dateTime);
        $this->assertNotNull($date);
        $converted = $date->toDateTime();
        $this->assertSame($dateTime->getOffset(), $converted->getOffset());
        $this->assertSame($dateTime->getTimestamp(), $converted->getTimestamp());
    }

    public function testDateTimeZonedConversion()
    {
        date_default_timezone_set('Europe/London');
        $dateTime = (new \DateTime())->setTimezone(new \DateTimeZone('America/Phoenix'));
        $date = DateTimeZoned::fromDateTime($dateTime);
        $this->assertNotNull($date);
        $converted = $date->toDateTime();
        $this->assertSame($dateTime->getTimezone()->getName(), $converted->getTimezone()->getName());
        $this->assertSame($dateTime->getTimestamp(), $converted->getTimestamp());
    }

    public function testLocalDateTimeConversion()
    {
        date_default_timezone_set('Europe/London');
        $timeZone = new \DateTimeZone('America/Phoenix');
        $dateTime = new \DateTime('19:20:00', $timeZone);
        $date = LocalDateTime::fromDateTime($dateTime);
        $this->assertNotNull($date);
        $converted = $date->toDateTime();
        $this->assertNotEquals($dateTime->getOffset(), $converted->getOffset());
        $converted->setTimezone($timeZone);
        $this->assertSame($dateTime->format('Y-m-d H:i:s'), $converted->format('Y-m-d H:i:s'));
    }

    public function testTimeConversion()
    {
        date_default_timezone_set('Europe/London');
        $dateTime = new \DateTime('2001-01-01 19:20:00', new \DateTimeZone('America/Phoenix'));
        $time = Time::fromDateTime($dateTime);
        $this->assertNotNull($time);
        $converted = $time->toDateTime();
        $this->assertEquals($dateTime->getOffset(), $converted->getOffset());
        $this->assertSame($dateTime->format('H-i-s-u'), $converted->format('H-i-s-u'));
    }

    public function testLocalTimeConversion()
    {
        date_default_timezone_set('Europe/London');
        $dateTime = (new \DateTime())->setTimezone(new \DateTimeZone('America/Phoenix'));
        $time = LocalTime::fromDateTime($dateTime);
        $this->assertNotNull($time);
        $converted = $time->toDateTime();
        $this->assertNotEquals($dateTime->getOffset(), $converted->getOffset());
        $this->assertSame($dateTime->format('H-i-s-u'), $converted->format('H-i-s-u'));
    }

    public function testDurationConversion()
    {
        $interval = new \DateInterval('P1Y1M1DT1H1M333333333S');
        $duration = Duration::fromDateInterval($interval);
        $converted = $duration->toDateInterval();
        $delta = new \DateTimeImmutable('@0');
        $originalDurInSec = $delta->add($interval)->getTimestamp();
        $convertedDurInSec = $delta->add($converted)->getTimestamp();
        $this->assertSame($originalDurInSec, $convertedDurInSec);
    }
}
