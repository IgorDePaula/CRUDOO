<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 14/05/17
 * Time: 21:11
 */

namespace AppTest;

use App\Update;
use App\Data\BridgeData as BD;

class UpdateTest extends \PHPUnit_Framework_TestCase
{
    private $obj = null;

    public function setUp()
    {
        parent::setUp();
        $this->obj = new Update();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->obj = null;
    }

    /**
     * @dataProvider provider
     */
    public function testUpdateSql($expected, $table, $data)
    {

        $this->obj->setData(
            (new BD)
                ->setData($data['data'])
                ->setIndex($data['index'][0])
                ->setValue($data['index'][1])
        );
        $this->obj->setTable($table);
        $this->assertEquals($expected, $this->obj->getSql());
    }

    public function provider()
    {
        return [
            ['UPDATE user SET login=igor WHERE id=2', 'user', ['data' => ['login' => 'igor'], 'index' => ['id', 2]]],
        ];
    }
}
