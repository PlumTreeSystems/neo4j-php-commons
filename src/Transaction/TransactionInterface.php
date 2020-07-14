<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Neo4j\Common\Transaction;

use Neo4j\Common\Cypher\Statement;
use Neo4j\Common\Cypher\StatementInterface;
use Neo4j\Common\Result\Result;
use Neo4j\Common\Result\ResultCollection;

interface TransactionInterface
{
    /**
     * @return bool
     */
    public function isOpen();

    /**
     * @return bool
     */
    public function isCommited();

    /**
     * @return bool
     */
    public function isRolledBack();

    /**
     * @return string
     */
    public function status();

    /**
     */
    public function commit();

    /**
     */
    public function rollback();

    /**
     * @param string      $statement
     * @param array       $parameters
     * @param null|string $tag
     */
    public function push($statement, array $parameters = [], $tag = null);

    public function begin();

    /**
     * @param Statement $statement
     *
     * @return Result
     */
    public function run(Statement $statement);

    /**
     * @param StatementInterface[] $statements
     *
     * @return ResultCollection|Result[]
     */
    public function runMultiple(array $statements);
}
