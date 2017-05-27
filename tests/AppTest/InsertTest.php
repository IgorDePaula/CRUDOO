<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 07/05/17
 * Time: 14:18
 */

namespace AppTest;

use App\Insert;
use App\Data\BridgeData as BD;
use InvalidArgumentException;

class InsertTest extends \PHPUnit_Framework_TestCase
{
    private $obj = null;

    public function setUp()
    {
        parent::setUp();
        $this->obj = new Insert();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->obj = null;
    }

    /**
     * @dataProvider dadosProvider
     */
    public function testSqlInsert($data, $expected)
    {
        $this->obj->setTable('user');
        $this->obj->setData((new BD())->setKey($data)->setData($data));
        $this->assertEquals($expected, $this->obj->getSql());
    }

    /**
     * @expectedException InvalidArgumentException
     * @dataProvider dadosProvider
     */
    public function testSqlInsertThrowException($data, $expected)
    {
        $this->obj->setTable('user');
        $this->obj->setData((new BridgeData())->setKey($data)->setData($data));
        $this->assertEquals($expected, $this->obj->getSql());
    }

    public function dadosProvider()
    {
        return [
            [
                ['user' => 'igor', 'email' => 'test@example.com'],
                'INSERT INTO user (user, email) VALUES (igor, test@example.com)'
            ]
        ];
    }
}
