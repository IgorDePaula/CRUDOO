<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 05/11/17
 * Time: 09:27
 */

namespace AppTest;


use App\Parameters\AndParameter;
use App\Parameters\Equals;
use App\Parameters\Field;
use App\Parameters\InParameter;
use App\Parameters\ORParameter;
use App\Parameters\Value;
use App\Select;

class SelectTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function getSqlWithEquals()
    {
        $expected = 'SELECT * FROM users WHERE name = igor';

        $select = new Select();
        $select->setTable('users');

        $equals = new Equals(new Field('name'), new Value('igor'));

        $select->where($equals);

        $actual = $select->getSql();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function getSqlWithEqualsAndAndParameter()
    {
        $expected = 'SELECT * FROM users WHERE (name = igor AND password = 1234)';

        $select = new Select();
        $select->setTable('users');

        $equalsname = new Equals(new Field('name'), new Value('igor'));
        $equalspsswd = new Equals(new Field('password'), new Value('1234'));

        $and = new AndParameter($equalsname, $equalspsswd);

        $select->where($and);

        $actual = $select->getSql();

        $this->assertEquals($expected, $actual);
    }
    /** @test */
    public function getSqlWithEqualsAndORParameter()
    {
        $expected = 'SELECT * FROM users WHERE name = igor OR password = 1234';

        $select = new Select();
        $select->setTable('users');

        $equalsname = new Equals(new Field('name'), new Value('igor'));
        $equalspsswd = new Equals(new Field('password'), new Value('1234'));

        $and = new ORParameter($equalsname, $equalspsswd);

        $select->where($and);

        $actual = $select->getSql();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function getSqlWithEqualsAndANDParameterORParameter()
    {
        $expected = 'SELECT * FROM users WHERE (name = igor AND password = 1234) OR active = 1';

        $select = new Select();
        $select->setTable('users');

        $equalsname = new Equals(new Field('name'), new Value('igor'));
        $equalspsswd = new Equals(new Field('password'), new Value('1234'));

        $and = new AndParameter($equalsname, $equalspsswd);

        $or = new ORParameter($and, new Equals(new Field('active'), new Value(1)));

        $select->where($or);

        $actual = $select->getSql();

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function getSqlWithInParameter()
    {
        $expected = 'SELECT * FROM users WHERE id IN (1, 2, 3)';

        $select = new Select();

        $select->setTable('users');

        $in = new InParameter(new Field('id'), [1,2,3]);

        $select->where($in);

        $actual = $select->getSql();

        $this->assertEquals($expected, $actual);
    }

}
