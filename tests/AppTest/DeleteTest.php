<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07/05/17
 * Time: 18:15
 */

namespace AppTest;

use App\Data\BridgeData as BD;
use App\Delete;
use InvalidArgumentException;

class DeleteTest extends \PHPUnit_Framework_TestCase
{
    private $obj = null;

    public function setUp()
    {
        parent::setUp();
        $this->obj = new Delete();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->obj = null;
    }

    /**
     * @dataProvider provider
     */
    public function testDeleteSql($expected, $table, $index, $value)
    {
        $this->obj->setData((new BD())->setIndex($index)->setValue($value));
        $this->obj->setTable($table);
        $this->assertEquals($expected, $this->obj->getSql());
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider provider
     */
    public function testDeleteSqlThrowException($expected, $table, $index, $value)
    {
        $this->obj->setData((new BridgeData())->setIndex($index)->setValue($value));
        $this->obj->setTable($table);
        $this->assertEquals($expected, $this->obj->getSql());
    }

    public function provider()
    {
        return [
            ['DELETE FROM user WHERE id=2', 'user', 'id', 2],
            ['DELETE FROM post WHERE postId=3', 'post', 'postId', 3],
        ];
    }
}
