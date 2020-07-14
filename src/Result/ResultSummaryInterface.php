<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Neo4j\Common\Result;

use Neo4j\Common\Cypher\StatementInterface;
use Neo4j\Common\Cypher\StatementType;

interface ResultSummaryInterface
{
    /**
     * @param \Neo4j\Common\Cypher\StatementInterface $statement
     */
    public function __construct(StatementInterface $statement);

    /**
     * @return \Neo4j\Common\Cypher\StatementInterface
     */
    public function statement();

    /**
     * @return StatementStatistics
     */
    public function updateStatistics();

    /**
     * @return array
     */
    public function notifications();

    /**
     * @return StatementType
     */
    public function statementType();
}
