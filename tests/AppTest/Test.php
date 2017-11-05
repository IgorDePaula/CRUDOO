<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 04/11/17
 * Time: 09:42
 */

namespace AppTest;

use App\Parameters\Equals;
use App\Parameters\Field;
use App\Parameters\Value;

class Test extends \PHPUnit_Framework_TestCase
{
    public function testEqualsInterpret()
    {
        $field = new Field('name');
        $value = new Value('igor');

        $equals = new Equals($field, $value);

        $expected = 'name = igor';
        $this->assertEquals($expected, $equals->interpret());
    }
}
