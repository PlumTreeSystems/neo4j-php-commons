<?php

namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Relationship as RelationshipInterface;

class Relationship extends MapAccess implements RelationshipInterface
{
    /**
     * @var int
     */
    protected $identity;

    /**
     * @var int
     */
    protected $startNodeIdentity;

    /**
     * @var int
     */
    protected $endNodeIdentity;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param int $identity
     * @param int $startNodeIdentity
     * @param int $endNodeIdentity
     * @param string $type
     * @param array $properties
     */
    public function __construct($identity, $startNodeIdentity, $endNodeIdentity, $type, array $properties = [])
    {
        $this->identity = $identity;
        $this->startNodeIdentity = $startNodeIdentity;
        $this->endNodeIdentity = $endNodeIdentity;
        $this->type = $type;
        $this->properties = $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function identity()
    {
        return $this->identity;
    }

    /**
     * @return int
     */
    public function startNodeIdentity()
    {
        return $this->startNodeIdentity;
    }

    /**
     * @return int
     */
    public function endNodeIdentity()
    {
        return $this->endNodeIdentity;
    }

    /**
     * {@inheritdoc}
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * {@inheritdoc}
     */
    public function hasType($type)
    {
        return $this->type === $type;
    }
}
