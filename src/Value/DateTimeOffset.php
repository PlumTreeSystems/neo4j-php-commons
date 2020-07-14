<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\DateTimeOffset as TypeDateTimeOffset;

class DateTimeOffset implements DateTimeConvertible, TypeDateTimeOffset
{
    private $epochSeconds;

    private $nanoseconds;

    private $zoneOffset;

    /**
     * DateTimeZoned constructor.
     * @param int $epochSeconds
     * @param int $nanoseconds
     * @param int $zoneOffset
     */
    public function __construct(int $epochSeconds, int $nanoseconds, int $zoneOffset)
    {
        $this->epochSeconds = $epochSeconds;
        $this->nanoseconds = $nanoseconds;
        $this->zoneOffset = $zoneOffset;
    }


    public static function fromDateTime(\DateTimeInterface $dateTime): self
    {
        return new self(
            (int)$dateTime->format('U'),
            $dateTime->format('u') * 1000,
            $dateTime->getOffset()
        );
    }

    public function toDateTime(): \DateTime
    {
        $date = new \DateTime();
        $date
            ->setTimestamp($this->epochSeconds)
            ->setTimezone(new \DateTimeZone(timezone_name_from_abbr('', $this->zoneOffset, 1)));
        return $date;
    }

    /**
     * @return int
     */
    public function getEpochSeconds(): int
    {
        return $this->epochSeconds;
    }

    /**
     * @return int
     */
    public function getNanoseconds(): int
    {
        return $this->nanoseconds;
    }

    /**
     * @return int
     */
    public function getZoneOffset(): int
    {
        return $this->zoneOffset;
    }

}
