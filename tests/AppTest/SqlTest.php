<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 25/06/17
 * Time: 15:10
 */

namespace AppTest;


use App\Delete;
use App\Insert;
use App\Sql;
use App\Update;

class SqlTest extends \PHPUnit_Framework_TestCase
{
    private $obj = null;

    public function setUp()
    {
        parent::setUp();
        $this->obj = new Sql();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->obj = null;
    }

    /**
     * @dataProvider dadosProvider
     */
    public function testInsert($data, $expected)
    {
        $insert = $this->obj->insert('user', $data);
        $this->assertEquals($expected, $insert->getSql());
        $this->assertEquals(Insert::class, get_class($insert));

    }

    /**
     * @dataProvider deleteProvider
     */
    public function testDelete($expected, $table, $index, $value)
    {
        $delete = $this->obj->delete($table, $index, $value);
        $this->assertEquals($expected, $delete->getSql());
        $this->assertEquals(Delete::class, get_class($delete));
    }

    /**
     * @dataProvider updateProvider
     */
    public function testUpdate($expected, $table, $data)
    {
        $update = $this->obj->update($table, $data['data'], $data['index'][0], $data['index'][1]);
        $this->assertEquals($expected, $update->getSql());
        $this->assertEquals(Update::class, get_class($update));
    }


    public function deleteProvider()
    {
        return [
            ['DELETE FROM user WHERE id=2', 'user', 'id', 2],
            ['DELETE FROM post WHERE postId=3', 'post', 'postId', 3],
        ];
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

    public function updateProvider()
    {
        return [
            ['UPDATE user SET login=igor WHERE id=2', 'user', ['data' => ['login' => 'igor'], 'index' => ['id', 2]]],
        ];
    }
}
