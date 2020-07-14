<?php

/**
 * This file is part of the GraphAware Neo4j Common package.
 *
 * (c) GraphAware Limited <http://graphaware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Neo4j\Common\Tests\Schema;

use Neo4j\Common\Schema\ConstraintType;
use Neo4j\Common\Schema\IndexDefinition;
use Neo4j\Common\Graph\Label;

/**
 * @group unit
 * @group schema
 */
class IndexDefinitionUnitTest extends \PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $def = new IndexDefinition(Label::label("User"), "login");
        $this->assertInstanceOf(IndexDefinition::class, $def);
    }

    public function testUniqueChecks()
    {
        $def = new IndexDefinition(Label::label("User"), "login", ConstraintType::UNIQUENESS());
        $this->assertTrue($def->isUnique());
        $this->assertEquals(ConstraintType::UNIQUENESS, $def->getConstraintType());
    }
}