<?php

namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Node as BaseNodeInterface;

class Node extends MapAccess implements BaseNodeInterface
{
    /**
     * @var int
     */
    protected $identity;

    /**
     * @var array
     */
    protected $labels;

    /**
     * @param int $identity
     * @param array $labels
     * @param array $properties
     */
    public function __construct($identity, array $labels = [], array $properties = [])
    {
        $this->identity = $identity;
        $this->labels = $labels;
        $this->properties = $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function identity(): int
    {
        return $this->identity;
    }

    /**
     * {@inheritdoc}
     */
    public function labels(): array
    {
        return $this->labels;
    }

    /**
     * {@inheritdoc}
     */
    public function hasLabel($label): bool
    {
        return in_array($label, $this->labels);
    }
}
