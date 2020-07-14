<?php


namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Date as TypeDate;

class Date implements DateTimeConvertible, TypeDate
{
    private $daysSinceEpoch;

    /**
     * Date constructor.
     * @param int $daysSinceEpoch
     */
    public function __construct(int $daysSinceEpoch)
    {
        $this->daysSinceEpoch = $daysSinceEpoch;
    }


    public static function fromDateTime(\DateTimeInterface $dateTime): self
    {
        $epoch = (new \DateTime())->setTimestamp(0);
        $diff = $dateTime->diff($epoch);
        return new self((int)$diff->format('%a'));
    }

    public function toDateTime(): \DateTime
    {
        $epoch = (new \DateTime())->setTimestamp(0);
        $epoch->add(new \DateInterval('P' . $this->daysSinceEpoch . 'D'));
        return $epoch;
    }

    /**
     * @return int
     */
    public function getDaysSinceEpoch(): int
    {
        return $this->daysSinceEpoch;
    }
  
}
