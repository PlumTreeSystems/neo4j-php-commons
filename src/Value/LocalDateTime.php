<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\LocalDateTime as TypeLocalDateTime;

class LocalDateTime implements DateTimeConvertible, TypeLocalDateTime
{
    private $epochSeconds;

    private $nanoseconds;

    /**
     * LocalDateTime constructor.
     * @param $epochSeconds
     * @param $nanoseconds
     */
    public function __construct($epochSeconds, $nanoseconds)
    {
        $this->epochSeconds = $epochSeconds;
        $this->nanoseconds = $nanoseconds;
    }


    public static function fromDateTime(\DateTimeInterface $dateTime)
    {
        return new self(
            (int)$dateTime->format('U'),
            $dateTime->format('u') * 1000
        );
    }

    public function toDateTime(): \DateTime
    {
        return new \DateTime('@' . $this->epochSeconds);
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

}
