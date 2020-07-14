<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\DateTimeZoned as TypeDateTimeZoned;

class DateTimeZoned implements DateTimeConvertible, TypeDateTimeZoned
{

    private $epochSeconds;

    private $nanoseconds;

    private $zoneId;

    /**
     * DateTimeZoned constructor.
     * @param $epochSeconds
     * @param $nanoseconds
     * @param $zoneId
     */
    public function __construct(int $epochSeconds, int $nanoseconds, string $zoneId)
    {
        $this->epochSeconds = $epochSeconds;
        $this->nanoseconds = $nanoseconds;
        $this->zoneId = $zoneId;
    }


    public static function fromDateTime(\DateTimeInterface $dateTime): self
    {
        return new self(
            (int)$dateTime->format('U'),
            $dateTime->format('u') * 1000,
            $dateTime->getTimezone()->getName()
        );
    }

    public function toDateTime(): \DateTime
    {
        $date = new \DateTime();
        $date
            ->setTimestamp($this->epochSeconds)
            ->setTimezone(new \DateTimeZone($this->zoneId));
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
     * @return string
     */
    public function getZoneId(): string
    {
        return $this->zoneId;
    }
   
}
