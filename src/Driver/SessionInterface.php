<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Neo4j\Common\Driver;

use Neo4j\Common\Cypher\StatementCollectionInterface;
use Neo4j\Common\Cypher\StatementInterface;
use Neo4j\Common\Transaction\TransactionInterface;

interface SessionInterface
{
    /**
     * @param string      $statement
     * @param array       $parameters
     * @param null|string $tag
     *
     * @return \Neo4j\Common\Result\Result
     */
    public function run(StatementInterface $statement);

    public function close();

    /**
     * @return TransactionInterface
     */
    public function transaction();

    /**
     * @param string|null $query
     * @param array       $parameters
     * @param string|null $tag
     *
     * @return PipelineInterface
     */
    public function createPipeline(?StatementCollectionInterface $statements = null);
}
