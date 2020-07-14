<?php

namespace Neo4j\Common\Value;

use Neo4j\Common\Type\Relationship as BaseRelationshipInterface;

class UnboundRelationship extends MapAccess implements BaseRelationshipInterface
{
    /**
     * @var string
     */
    protected $identity;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $identity
     * @param string $type
     * @param string array $properties
     */
    public function __construct($identity, $type, array $properties)
    {
        $this->identity = $identity;
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
