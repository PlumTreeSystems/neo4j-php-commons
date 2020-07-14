<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Neo4j\Common;

use Neo4j\Common\Connection\BaseConfiguration;
use Neo4j\Common\Driver\DriverInterface;

interface GraphDatabaseInterface
{
    /**
     * @param string             $uri
     * @param BaseConfiguration|null $config
     *
     * @return DriverInterface
     */
    public static function driver($uri, BaseConfiguration $config = null);
}
