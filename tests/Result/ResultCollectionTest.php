<?php

namespace Neo4j\Common\Tests\Result;

use Neo4j\Common\Cypher\Statement;
use Neo4j\Common\Result\ResultCollection;
use Neo4j\Common\Result\RecordCursorInterface;

/**
 * Class ResultCollectionTest
 * @package Neo4j\Common\Tests\Result
 *
 * @group unit
 * @group result
 */
class ResultCollectionTest extends \PHPUnit_Framework_TestCase
{
    public function testInit()
    {
        $statement1 = Statement::create("MATCH (n) RETURN count(n)");
        $result = new RecordCursor($statement1);

        $coll = new ResultCollection();
        $coll->add($result);

        $this->assertEquals(1, $coll->size());
        $this->assertEquals(null, $coll->get('non existing tag', null));
    }

    public function testCollectionParseTags()
    {
        $statement1 = Statement::create("MATCH (n) RETURN count(n)", array(), 'tag1');
        $statement2 = Statement::create("CREATE (n:Node)", array(), 'tag2');
        $result1 = new RecordCursor($statement1);
        $result2 = new RecordCursor($statement2);

        $coll = new ResultCollection();
        $coll->add($result1);
        $coll->add($result2);

        $this->assertEquals("MATCH (n) RETURN count(n)", $coll->get('tag1')->statement()->text());
    }

    public function testCollectionOfResultsIsTraversable()
    {
        $statement1 = Statement::create("MATCH (n) RETURN count(n)", array(), 'tag1');
        $statement2 = Statement::create("CREATE (n:Node)", array(), 'tag2');
        $result1 = new RecordCursor($statement1);
        $result2 = new RecordCursor($statement2);

        $coll = new ResultCollection();
        $coll->add($result1);
        $coll->add($result2);

        foreach ($coll as $result) {
            $this->assertInstanceOf(RecordCursorInterface::class, $result);
        }
    }
}