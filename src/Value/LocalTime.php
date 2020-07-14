<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\LocalTime as TypeLocalTime;

class LocalTime implements DateTimeConvertible, TypeLocalTime
{

    private $nanoSecondsSinceMidnight;

    /**
     * Time constructor.
     * @param int $nanoSecondsSinceMidnight
     */
    public function __construct(int $nanoSecondsSinceMidnight)
    {
        $this->nanoSecondsSinceMidnight = $nanoSecondsSinceMidnight;
    }

    public static function fromDateTime(\DateTimeInterface $dateTime)
    {
        $midnight = (clone $dateTime)->modify('midnight');
        $nano = ($dateTime->getTimestamp() - $midnight->getTimestamp()) * 1000000000 + ($dateTime->format('u') * 1000);
        return new self($nano);
    }

    public function toDateTime(): \DateTime
    {
        $date = (new \DateTime('today midnight'));
        $seconds = (int) ($this->nanoSecondsSinceMidnight / 1000000000);
        $microSeconds = (int) (($this->nanoSecondsSinceMidnight % 1000000000) / 1000);
        $minutes = (int) ($seconds / 60);
        $hours = (int) ($minutes / 60);
        $date->setTime($hours, $minutes % 60, $seconds % 60, $microSeconds);
        return $date;
    }

    /**
     * @return int
     */
    public function getNanoSecondsSinceMidnight(): int
    {
        return $this->nanoSecondsSinceMidnight;
    }
    
}
