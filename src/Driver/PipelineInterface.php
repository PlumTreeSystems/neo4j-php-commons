<?php

namespace Neo4j\Common\Driver;

use Neo4j\Common\Cypher\StatementInterface;

interface PipelineInterface
{
    /**
     * @param StatementInterface $statement
     */
    public function push(StatementInterface $statement);

    /**
     * @return \Neo4j\Common\Result\ResultCollection
     */
    public function run();
}
